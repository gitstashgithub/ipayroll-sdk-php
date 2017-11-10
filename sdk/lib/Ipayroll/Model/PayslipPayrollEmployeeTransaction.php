<?php

namespace Ipayroll\Model;


use JMS\Serializer\Annotation\Type;

class PayslipPayrollEmployeeTransaction extends Resource
{
    /**
     * @Type("double")
     */
    public $amount;

    /**
     * @Type("double")
     */
    public $quantity;

    /**
     * @Type("string")
     */
    public $charity;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("string")
     */
    public $notes;

    /**
     * @Type("string")
     */
    public $displayPayslipQuantity;


}