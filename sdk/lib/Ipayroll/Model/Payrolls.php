<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Payrolls extends Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\Payroll>")
     */
    public $content;

    public function __toString()
    {
        return (String)print_r($this, true);
    }

}