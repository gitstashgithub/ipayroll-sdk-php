<?php

namespace Ipayroll\Rest\Requester;


trait delete
{
    public function delete($id)
    {
        return $this->requester->delete($this->url . '/' . $id)->asOne($this->resources);
    }
}