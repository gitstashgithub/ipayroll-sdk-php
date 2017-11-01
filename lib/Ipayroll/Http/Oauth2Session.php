<?php

namespace Ipayroll\Http;

use Ipayroll\Http\Requester;
use League\OAuth2\Client\Provider\GenericProvider;

class Oauth2Session
{

    private $baseUrl;
    private $provider;
    private $accessToken;

    public function __construct($baseUrl, array $options = [], $accessToken)
    {
        $this->baseUrl = $baseUrl;
        $this->provider = new GenericProvider($options);
        $this->accessToken = $accessToken;
    }

    public function getAuthorizationUrl()
    {
        return $this->provider->getAuthorizationUrl();
    }

    public function exchangeAuthorizationCodeForAccessToken($code)
    {
        $this->accessToken = $this->provider->getAccessToken('authorization_code', [
            'code' => $code
        ]);
        return $this->accessToken;
    }

    public function refreshAccessToken()
    {
        $this->accessToken = $this->provider->getAccessToken('refresh_token', [
            'refresh_token' => $this->accessToken->getRefreshToken()
        ]);
        return $this->accessToken;
    }

    public function getRequester()
    {
        return new Requester($this, $this->provider, $this->accessToken, $this->baseUrl);
    }

    public function isConnected()
    {
        return $this->accessToken != null;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

}