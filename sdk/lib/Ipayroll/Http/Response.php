<?php

namespace Ipayroll\Http;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;
use Psr\Http\Message\ResponseInterface;

class Response
{
    var $response;
    var $jsonSerializer;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->jsonSerializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->build();
    }

    public function asOne($resourceName)
    {
        $content = (string)$this->response->getBody();
        return $this->jsonSerializer->deserialize($content, $resourceName, 'json');
    }

    public function asList($resourceName)
    {
        $content = (string)$this->response->getBody();
        return $this->jsonSerializer->deserialize($content, $resourceName, 'json');
    }

}