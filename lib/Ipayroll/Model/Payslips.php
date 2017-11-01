<?php

namespace Ipayroll\Model;


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