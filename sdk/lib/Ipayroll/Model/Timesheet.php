<?php

namespace Ipayroll\Model;


use JMS\Serializer\Annotation\Type;

class Timesheet extends Resource
{
    /**
     * @Type("string")
     */
    public $employeeId;

    /**
     * @Type("integer")
     */
    public $daysInPeriod;

    /**
     * @Type("integer")
     */
    public $totalHours;

    /**
     * @Type("string")
     */
    public $paidToDate;

    /**
     * @Type("string")
     */
    public $paidFromDate;

    /**
     * @Type("string")
     */
    public $message;

    /**
     * @Type("ArrayCollection<Ipayroll\Model\TimesheetTransaction>")
     */
    public $transactions;
}