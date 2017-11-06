<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class EmployeePayRates extends Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\PayRate>")
     */
    public $content;

    public function __toString()
    {
        return (String)print_r($this, true);
    }
}