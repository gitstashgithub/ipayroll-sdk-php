<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Payroll extends Resource
{
    /**
     * @Type("string")
     */
    public $payrollNumber;

    /**
     * @Type("string")
     */
    public $payDate;

    /**
     * @Type("string")
     */
    public $message;

    /**
     * @Type("string")
     */
    public $status;

    /**
     * @Type("string")
     */
    public $payrollType;

    /**
     * @Type("Ipayroll\Model\PayrollPayFrequency")
     */
    public $payFrequencies;
}