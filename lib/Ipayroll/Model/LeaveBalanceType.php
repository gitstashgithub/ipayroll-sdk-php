<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class LeaveBalanceType
{
    /**
     * @Type("string")
     */
    public $leaveType;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $unit;
}