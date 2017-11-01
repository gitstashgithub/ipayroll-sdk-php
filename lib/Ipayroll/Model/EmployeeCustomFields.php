<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class EmployeeCustomFields extends Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\EmployeeCustomField>")
     */
    public $content;

    public function __toString()
    {
        return (String)print_r($this, true);
    }
}