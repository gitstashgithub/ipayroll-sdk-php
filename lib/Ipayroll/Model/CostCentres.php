<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class CostCentres extends Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\CostCentre>")
     */
    public $content;

    public function __toString()
    {
        return (String)print_r($this, true);
    }
}