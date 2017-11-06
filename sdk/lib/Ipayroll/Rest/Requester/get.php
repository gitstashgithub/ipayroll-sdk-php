<?php

namespace Ipayroll\Rest\Requester;

trait get
{
    public function get($id)
    {
        return $this->requester->get($this->url . '/' . $id)->asOne($this->resource);
    }
}