<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class PayRate extends Resource
{
    /**
     * @Type("double")
     */
    public $hourlyRate;

    /**
     * @Type("double")
     */
    public $annualRate;

    /**
     * @Type("double")
     */
    public $rate;

    /**
     * @Type("string")
     */
    public $code;

    /**
     * @Type("string")
     */
    public $divisor;

    /**
     * @Type("string")
     */
    public $payScaleCode;
}