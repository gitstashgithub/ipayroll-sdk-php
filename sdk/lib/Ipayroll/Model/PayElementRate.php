<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class PayElementRate
{

    /**
     * @Type("string")
     */
    public $reportingGroupName;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("double")
     */
    public $rate;

    /**
     * @Type("double")
     */
    public $years;

    /**
     * @Type("double")
     */
    public $taxablePayPerWeek;

    /**
     * @Type("double")
     */
    public $hoursPerWeek;

    /**
     * @Type("double")
     */
    public $multiplier;
}