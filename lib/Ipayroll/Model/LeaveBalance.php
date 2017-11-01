<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class LeaveBalance extends Resource
{

    /**
     * @Type("string")
     */
    public $employeeId;

    /**
     * @Type("double")
     */
    public $entitled;

    /**
     * @Type("double")
     */
    public $accrued;

    /**
     * @Type("double")
     */
    public $taken;

    /**
     * @Type("double")
     */
    public $balance;

    /**
     * @Type("Ipayroll\Model\LeaveBalanceType")
     */
    public $leaveBalanceType;

    /**
     * @Type("string")
     */
    public $nextAnniversaryDate;

    /**
     * @Type("string")
     */
    public $lastAnniversaryDate;
}