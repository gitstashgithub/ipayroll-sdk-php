<?php

namespace Ipayroll\Rest\Requester;


trait all
{
    public function all($page=0, $size=20)
    {
        $params = array(
            'page' => $page,
            'size' => $size
        );
        return $this->requester->get($this->url, $params)->asOne($this->resources);
    }
}