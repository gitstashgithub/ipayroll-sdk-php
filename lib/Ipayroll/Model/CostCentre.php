<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class CostCentre extends Resource
{

    /**
     * @Type("string")
     */
    public $code;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("string")
     */
    public $displayValue;
}