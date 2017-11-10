<?php

namespace Ipayroll\Model;


use JMS\Serializer\Annotation\Type;

class PayslipLeaveBalance
{

    /**
     * @Type("string")
     */
    public $balanceName;

    /**
     * @Type("double")
     */
    public $hours;

    /**
     * @Type("double")
     */
    public $days;

    /**
     * @Type("double")
     */
    public $amount;
}