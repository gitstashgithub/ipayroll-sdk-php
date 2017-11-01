<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Address
{

    /**
     * @Type("string")
     */
    public $addressLine1;

    /**
     * @Type("string")
     */
    public $addressLine2;

    /**
     * @Type("string")
     */
    public $suburb;

    /**
     * @Type("string")
     */
    public $city;

    /**
     * @Type("string")
     */
    public $postCode;

    /**
     * @Type("string")
     */
    public $country;
}