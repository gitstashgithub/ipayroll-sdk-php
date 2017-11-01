<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Resource
{
    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("ArrayCollection<Ipayroll\Model\Link>")
     */
    public $links; // = fields.Collection(Links)


    public function __toString()
    {
        return (String)print_r($this, true);
    }
}