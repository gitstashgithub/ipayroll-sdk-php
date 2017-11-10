<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Timesheets extends Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\Timesheet>")
     */
    public $content;

    public function __toString()
    {
        return (String)print_r($this, true);
    }
}