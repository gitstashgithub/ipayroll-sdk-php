<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class PayslipPayroll extends Resource
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
}