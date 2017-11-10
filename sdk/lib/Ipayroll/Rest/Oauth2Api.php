<?php

namespace Ipayroll\Rest;

use Ipayroll\Http\Oauth2Session;

class Oauth2Api
{
    private $session;

    public function __construct(Oauth2Session $session)
    {
        $this->session = $session;
    }

    public function isConnected()
    {
        return $this->session->getAccessToken() != null;
    }

    public function getAuthorizationUrl()
    {
        return $this->session->getAuthorizationUrl();
    }

    public function exchangeAuthorizationCodeForAccessToken($code)
    {
        return $this->session->exchangeAuthorizationCodeForAccessToken($code);
    }

    public function refreshAccessToken()
    {
        return $this->session->refreshAccessToken();
    }

    public function connectWithRefreshToken($refreshToken)
    {
        return $this->session->refreshAccessToken($refreshToken);
    }

    public function connectWithAccessToken($accessToken)
    {
        return $this->session->refreshAccessToken($accessToken->getRefreshToken());
    }

}