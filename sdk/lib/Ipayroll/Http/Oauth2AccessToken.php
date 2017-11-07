<?php

namespace Ipayroll\Http;

use League\OAuth2\Client\Token\AccessToken;

class Oauth2AccessToken
{
    private $accessToken;
    private $expires;
    private $refreshToken;
    private $scopes;
    private $tokenType;

    public function __construct(AccessToken $token)
    {
        $this->accessToken = $token->getToken();
        $this->expires = $token->getExpires();
        $this->refreshToken = $token->getRefreshToken();
        $this->scopes = $token->getValues()['scope'];
        $this->tokenType = $token->getValues()['token_type'];
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function getExpires()
    {
        return $this->expires;
    }

    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    public function getScopes()
    {
        return $this->scopes;
    }

    public function getTokenType()
    {
        return $this->tokenType;
    }

    public function __toString()
    {
        return (String)print_r($this, true);
    }

}