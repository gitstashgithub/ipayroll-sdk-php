<?php

namespace Ipayroll\Exception;

class AuthorizationException extends \RuntimeException
{

    public function __construct($message)
    {
        $this->message = $message;
    }

}