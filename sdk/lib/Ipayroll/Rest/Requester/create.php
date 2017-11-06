<?php

namespace Ipayroll\Rest\Requester;

trait create
{
    public function create(Array $datas)
    {
        return $this->requester->post($this->url, $datas)->asArray($this->resource);
    }
}