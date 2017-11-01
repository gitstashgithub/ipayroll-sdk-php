<?php

namespace Ipayroll\Rest\Requester;

trait update
{
    public function update(Resource $data)
    {
        return $this->requester->post($this->url . '/' . $data->id , $data)->asOne($this->resource);
    }
}