<?php

namespace Ipayroll\Model;


class Timesheet extends Resource
{
    public $employeeId;
    public $daysInPeriod;
    public $totalHours;
    public $paidToDate;
    public $paidFromDate;
    public $message;
    public $transactions;// = fields.Collection(TimesheetTransaction)
}