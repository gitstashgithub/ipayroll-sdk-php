<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class PayElements extends Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\PayElement>")
     */
    public $content;

    public function __toString()
    {
        return (String)print_r($this, true);
    }
}