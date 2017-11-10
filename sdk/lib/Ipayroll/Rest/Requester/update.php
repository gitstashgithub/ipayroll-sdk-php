<?php

namespace Ipayroll\Rest\Requester;

trait update
{
    public function update($data)
    {
        return $this->requester->put($this->url . '/' . $data->id, $data)->asOne($this->resource);
    }
}