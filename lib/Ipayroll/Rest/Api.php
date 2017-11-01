<?php

namespace Ipayroll\Rest;


use Ipayroll\Http\Requester;

class Api
{
    protected $requester;

    public function __construct(Requester $requester)
    {
        $this->requester = $requester;
    }
}