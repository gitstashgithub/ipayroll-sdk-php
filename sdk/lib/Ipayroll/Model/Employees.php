<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Employees extends Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\Employee>")
     */
    public $content;

    public function __toString()
    {
        return (String)print_r($this, true);
    }
}