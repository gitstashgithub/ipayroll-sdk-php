<?php

namespace Ipayroll\Http;

use GuzzleHttp\Exception\ClientException;
use Ipayroll\Exception\AuthorizationException;
use Ipayroll\Exception\Error;
use Ipayroll\Exception\RestException;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;

class Requester
{
    private $baseUrl;
    private $provider;
    private $oauth2Session;
    private $accessToken;
    private $autorefresh = true;
    private $autorefreshCount = 3;

    public function __construct(Oauth2Session $oauth2Session, GenericProvider $provider, $accessToken, $baseUrl)
    {
        $this->oauth2Session = $oauth2Session;
        $this->provider = $provider;
        $this->baseUrl = $baseUrl;
        $this->accessToken = $accessToken;
    }

    public function get($url)
    {
        $request = $this->provider->getAuthenticatedRequest(
            'GET',
            $this->getUrl($url),
            $this->accessToken
        );
        return $this->executeRequest($request);
    }

    public function post($url, $data)
    {
        $requestContent = [
            'headers' => [
                'Content-Type: application/json'
            ],
            'body' => $this->jsonSerializer->serialize($data, 'json')
        ];
        $request = $this->provider->getAuthenticatedRequest(
            'POST',
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

    function getUrl($url) {
        return $this->baseUrl . $url;
    }

    function executeRequest($request, $count = 0)
    {
        try {
            $response = $this->provider->getHttpClient()->send($request);
            return new Response($response);
        } catch (ClientException $e) {
            if($e->getCode() == 401) {
                return $this->handleAuthorizationError($e, $request, $count);
            }
            $this->handleError($e, $request);
        }
    }

    function handleError($e, $request) {
        $response = new Response($e->getResponse());
        $error = $response->asOne('Ipayroll\Exception\Error');
        throw new RestException($error, $request->getUri()->getPath());
    }

    function handleAuthorizationError($e, $request, $count) {
        if($this->autorefresh && $count < $this->autorefreshCount) {
            $accessToken = $this->oauth2Session->refreshAccessToken();
            $request = $request->withHeader('Authorization', 'Bearer ' . $accessToken->getToken());
            return $this->executeRequest($request, ++$count);
        } else {
            throw new AuthorizationException($e->getMessage());
        }
    }
}