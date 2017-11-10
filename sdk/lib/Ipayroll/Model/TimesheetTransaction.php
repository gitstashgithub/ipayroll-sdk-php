<?php

namespace Ipayroll\Model;


use JMS\Serializer\Annotation\Type;

class TimesheetTransaction extends Resource
{

    /**
     * @Type("string")
     */
    public $timesheetTransactionId;

    /**
     * @Type("double")
     */
    public $amount;

    /**
     * @Type("double")
     */
    public $quantity;

    /**
     * @Type("double")
     */
    public $rate;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("string")
     */
    public $costCentre;

    /**
     * @Type("string")
     */
    public $reason;

    /**
     * @Type("string")
     */
    public $leaveFrom;

    /**
     * @Type("string")
     */
    public $leaveTo;

    /**
     * @Type("string")
     */
    public $leaveDays;

    /**
     * @Type("string")
     */
    public $payElement;
}