<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class LeaveRequest extends Resource
{

    /**
     * @Type("integer")
     */
    public $requestId;

    /**
     * @Type("string")
     */
    public $employeeId;

    /**
     * @Type("double")
     */
    public $hours;

    /**
     * @Type("double")
     */
    public $days;

    /**
     * @Type("string")
     */
    public $leaveFromDate;

    /**
     * @Type("string")
     */
    public $leaveToDate;

    /**
     * @Type("string")
     */
    public $reason;

    /**
     * @Type("string")
     */
    public $status;

    /**
     * @Type("string")
     */
    public $payElement;

    /**
     * @Type("Ipayroll\Model\LeaveBalanceType")
     */
    public $leaveBalanceType;

    /**
     * @Type("integer")
     */
    public $payElementId;

    /**
     * @Type("double")
     */
    public $quantity;

}