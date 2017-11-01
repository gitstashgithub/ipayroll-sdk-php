<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class EmployeeLeaveRequests extends Resources
{
    /**
     * @Type("ArrayCollection<Ipayroll\Model\LeaveRequest>")
     */
    public $content;

    public function __toString()
    {
        return (String)print_r($this, true);
    }
}