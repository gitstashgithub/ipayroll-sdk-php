<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class EmployeeLeaveBalances extends Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\LeaveBalance>")
     */
    public $content;

    public function __toString()
    {
        return (String)print_r($this, true);
    }
}