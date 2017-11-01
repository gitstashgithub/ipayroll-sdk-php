<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class EmployeeCustomField extends Resource
{

    /**
     * @Type("integer")
     */
    public $category;

    /**
     * @Type("string")
     */
    public $categoryName;

    /**
     * @Type("integer")
     */
    public $customFieldId;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $date;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("string")
     */
    public $contact;

    /**
     * @Type("string")
     */
    public $relationship;

    /**
     * @Type("string")
     */
    public $phoneNumber;

    /**
     * @Type("string")
     */
    public $email;

    /**
     * @Type("string")
     */
    public $address;

    /**
     * @Type("string")
     */
    public $hayPoints;

    /**
     * @Type("string")
     */
    public $haysProfile;

    /**
     * @Type("string")
     */
    public $fte;

    /**
     * @Type("string")
     */
    public $finish;

    /**
     * @Type("string")
     */
    public $start;

    /**
     * @Type("string")
     */
    public $reportsTo;

    /**
     * @Type("string")
     */
    public $reportsFrom;

    /**
     * @Type("double")
     */
    public $contractHours;

    /**
     * @Type("double")
     */
    public $periodDays;

    /**
     * @Type("string")
     */
    public $contractEnd;

    /**
     * @Type("string")
     */
    public $renumerationType;

    /**
     * @Type("string")
     */
    public $annualBenefit;

    /**
     * @Type("string")
     */
    public $award;
}