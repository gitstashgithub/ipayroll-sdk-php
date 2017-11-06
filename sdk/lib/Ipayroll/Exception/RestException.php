<?php

namespace Ipayroll\Exception;

class RestException extends \RuntimeException
{
    private $error;

    public function __construct(Error $error, $path)
    {
        $this->error = $error;
        parent::__construct('Error on target [' . $path . ']-> ' . $this->error->getMessage());
    }

    public function getError()
    {
        return $this->error;
    }

}