<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Payslips extends Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\Payslip>")
     */
    public $content;

    public function __toString()
    {
        return (String)print_r($this, true);
    }
}