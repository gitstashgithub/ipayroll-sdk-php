<?php

namespace Ipayroll\Rest\Requester;


trait all
{
    public function all()
    {
        return $this->requester->get($this->url)->asOne($this->resources);
    }
}