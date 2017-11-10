<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class TokenUpdater
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }


    public function update($accessToken)
    {
        $this->session->set('accessToken', $accessToken);
        echo $accessToken;
    }

    public function getAccessToken()
    {
        return $this->session->get('accessToken');
    }

}