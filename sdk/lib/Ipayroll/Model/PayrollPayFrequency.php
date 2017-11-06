<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class PayrollPayFrequency extends Resource
{
    /**
     * @Type("string")
     */
    public $payrollNumber;

    /**
     * @Type("boolean")
     */
    public $included;

    /**
     * @Type("string")
     */
    public $paidToDate;

}