<?php

namespace Ipayroll\Http;

use Ipayroll\Http\Requester;
use League\OAuth2\Client\Provider\GenericProvider;

class Oauth2Session
{

    private $baseUrl;
    private $provider;
    private $accessToken;
    private $requester;
    private $accessTokenUpdater;

    public function __construct($baseUrl, $accessToken, $accessTokenUpdater, array $options = [])
    {
        $this->baseUrl = $baseUrl;
        $this->accessToken = $accessToken;
        $this->accessTokenUpdater = $accessTokenUpdater;
        $this->provider = new GenericProvider($options);
        $this->requester = new Requester($this, $this->provider, $this->accessToken, $this->baseUrl);
    }

    public function withAccessTokenUpdater($accessTokenUpdater)
    {
        $this->accessTokenUpdater = $accessTokenUpdater;
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
        $this->updateToken($this->accessToken);
        return $this->accessToken;
    }

    public function refreshAccessToken()
    {
        $this->accessToken = $this->provider->getAccessToken('refresh_token', [
            'refresh_token' => $this->accessToken->getRefreshToken()
        ]);
        $this->updateToken($this->accessToken);
        return $this->accessToken;
    }

    private function updateToken($accessToken)
    {
        if($this->accessTokenUpdater != null)
        {
            $this->accessTokenUpdater->update($accessToken);
        }
    }

    public function getRequester()
    {
        return $this->requester;
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