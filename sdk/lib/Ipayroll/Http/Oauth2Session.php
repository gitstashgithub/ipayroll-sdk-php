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
        $accessToken = $this->provider->getAccessToken('authorization_code', [
            'code' => $code
        ]);
        return $this->updateToken($accessToken);
    }

    public function refreshAccessToken($refreshToken = null)
    {
        if($refreshToken == null){
            $refreshToken = $this->accessToken->getRefreshToken();
        }
        $accessToken = $this->provider->getAccessToken('refresh_token', [
            'refresh_token' => $refreshToken
        ]);
        return $this->updateToken($accessToken);
    }

    public function getRequester()
    {
        return $this->requester;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    private function updateToken($accessToken)
    {
        $this->accessToken = $accessToken;
        if($this->accessTokenUpdater != null)
        {
            $this->accessTokenUpdater->update(new Oauth2AccessToken($accessToken));
        }
        return new Oauth2AccessToken($accessToken);
    }

}