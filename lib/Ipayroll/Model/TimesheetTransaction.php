<?php

namespace Ipayroll\Model;


class TimesheetTransaction extends Resource
{
    public $timesheetTransactionId;
    public $amount;
    public $quantity;
    public $rate;
    public $description;
    public $costCentre;
    public $reason;
    public $leaveFrom;
    public $leaveTo;
    public $leaveDays;
    public $payElement;
}