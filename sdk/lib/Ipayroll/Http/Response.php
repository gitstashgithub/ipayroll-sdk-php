<?php

namespace Ipayroll\Http;

use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;

class Response
{
    var $response;
    var $jsonSerializer;

    public function __construct(ResponseInterface $response, Serializer $jsonSerializer)
    {
        $this->response = $response;
        $this->jsonSerializer = $jsonSerializer;
    }

    public function asOne($resourceName)
    {
        $content = (string)$this->response->getBody();
        return $this->jsonSerializer->deserialize($content, $resourceName, 'json');
    }

    public function asArray($resourceName)
    {
        $content = (string)$this->response->getBody();
        $arrayof = sprintf('array<%s>',$resourceName);
        return $this->jsonSerializer->deserialize($content, $arrayof, 'json');
    }

}