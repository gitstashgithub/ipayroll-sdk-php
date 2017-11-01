<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class LeaveEntitlementRule
{
    /**
     * @Type("integer")
     */
    public $startsAfterYears;

    /**
     * @Type("integer")
     */
    public $startsAfterMonths;

    /**
     * @Type("integer")
     */
    public $frequencyYears;

    /**
     * @Type("integer")
     */
    public $frequencyMonths;

    /**
     * @Type("double")
     */
    public $entitlementDays;

    /**
     * @Type("double")
     */
    public $entitlementMaxDays;

    /**
     * @Type("string")
     */
    public $leaveAccrualMethod;

    /**
     * @Type("string")
     */
    public $accrualPercentage;
}