<?php

namespace Ipayroll\Http;

use GuzzleHttp\Exception\ClientException;
use Ipayroll\Exception\AuthorizationException;
use Ipayroll\Exception\RestException;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;
use League\OAuth2\Client\Provider\GenericProvider;

class Requester
{
    private $baseUrl;
    private $provider;
    private $oauth2Session;
    private $accessToken;
    private $autorefresh = true;
    private $autorefreshCount = 3;

    private $jsonSerializer;

    public function __construct(Oauth2Session $oauth2Session, GenericProvider $provider, $accessToken, $baseUrl)
    {
        $this->oauth2Session = $oauth2Session;
        $this->provider = $provider;
        $this->baseUrl = $baseUrl;
        $this->accessToken = $accessToken;
        $this->jsonSerializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->build();
    }

    public function get($url, $params = [])
    {
        $request = $this->provider->getAuthenticatedRequest(
            'GET',
            $this->getUrl($url, $params),
            $this->accessToken
        );
        return $this->executeRequest($request);
    }

    function getUrl($path, $params = [])
    {
        $url = $this->baseUrl . $path;
        if(sizeof($params) > 0) {
            $url = $url . "?" . http_build_query($params);
        }
        return $url;
    }

    function executeRequest($request, $count = 0)
    {
        try {
            $response = $this->provider->getHttpClient()->send($request);
            return new Response($response, $this->jsonSerializer);
        } catch (ClientException $e) {
            if ($e->getCode() == 401) {
                return $this->handleAuthorizationError($e, $request, $count);
            }
            $this->handleError($e, $request);
        }
    }

    function handleAuthorizationError($e, $request, $count)
    {
        if ($this->autorefresh && $count < $this->autorefreshCount) {
            $accessToken = $this->oauth2Session->refreshAccessToken();
            $request = $request->withHeader('Authorization', 'Bearer ' . $accessToken->getAccessToken());
            return $this->executeRequest($request, ++$count);
        } else {
            throw new AuthorizationException($e->getMessage());
        }
    }

    function handleError($e, $request)
    {
        $response = new Response($e->getResponse(), $this->jsonSerializer);
        $error = $response->asOne('Ipayroll\Exception\Error');
        throw new RestException($error, $request->getUri()->getPath());
    }

    public function post($url, $data)
    {
        return $this->executeWithJson('POST', $url, $data);
    }

    public function put($url, $data)
    {
        return $this->executeWithJson('PUT', $url, $data);
    }

    private function executeWithJson($method, $url, $data)
    {
        $requestContent = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => $this->jsonSerializer->serialize($data, 'json')
        ];
        $request = $this->provider->getAuthenticatedRequest(
            $method,
            $this->getUrl($url),
            $this->accessToken,
            $requestContent
        );
        return $this->executeRequest($request);
    }

    public function delete($url)
    {
        $request = $this->provider->getAuthenticatedRequest(
            'DELETE',
            $this->getUrl($url),
            $this->accessToken
        );
        return $this->executeRequest($request);
    }
}