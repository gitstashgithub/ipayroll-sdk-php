<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class PayElement extends Resource
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

    /**
     * @Type("string")
     */
    public $calculationRule;

    /**
     * @Type("string")
     */
    public $group;

    /**
     * @Type("string")
     */
    public $type;

    /**
     * @Type("double")
     */
    public $multiplier;

    /**
     * @Type("string")
     */
    public $rateAmount;

    /**
     * @Type("boolean")
     */
    public $expired;

    /**
     * @Type("boolean")
     */
    public $accLevyLiable;

    /**
     * @Type("boolean")
     */
    public $superableEarning;

    /**
     * @Type("boolean")
     */
    public $holidayPayLiable;

    /**
     * @Type("boolean")
     */
    public $notKiwiSaverLiable;

    /**
     * @Type("boolean")
     */
    public $payrollTaxLiable;

    /**
     * @Type("boolean")
     */
    public $rdoLiable;

    /**
     * @Type("boolean")
     */
    public $lslLiable;

    /**
     * @Type("boolean")
     */
    public $casLiable;

    /**
     * @Type("boolean")
     */
    public $reducing;

    /**
     * @Type("boolean")
     */
    public $rayableOnFinalPay;

    /**
     * @Type("boolean")
     */
    public $itemisedOnPaymentSummary;

    /**
     * @Type("boolean")
     */
    public $allowPartialDeduction;

    /**
     * @Type("boolean")
     */
    public $consolidateTransactions;

    /**
     * @Type("string")
     */
    public $payeeReference;

    /**
     * @Type("string")
     */
    public $payeeCode;

    /**
     * @Type("string")
     */
    public $bankAccountNumber;

    /**
     * @Type("boolean")
     */
    public $reduceSuperable;

    /**
     * @Type("integer")
     */
    public $priority;

    /**
     * @Type("Ipayroll\Model\LeaveBalanceType")
     */
    public $leaveBalanceType;

    /**
     * @Type("string")
     */
    public $costCentresRule;

    /**
     * @Type("string")
     */
    public $paymentMethod;

    /**
     * @Type("string")
     */
    public $payeeParticulars;

    /**
     * @Type("string")
     */
    public $doneAddress;

    /**
     * @Type("string")
     */
    public $doneeName;

    /**
     * @Type("boolean")
     */
    public $unusedLeavePayment;

    /**
     * @Type("boolean")
     */
    public $employmentTerminationPayment;

    /**
     * @Type("boolean")
     */
    public $employmentTerminationPaymentNoLumpD;

    /**
     * @Type("boolean")
     */
    public $availableForLeaveRequest;

    /**
     * @Type("string")
     */
    public $leaveTaxType;

    /**
     * @Type("string")
     */
    public $paymentGroup;

    /**
     * @Type("ArrayCollection<Ipayroll\Model\LeaveEntitlementRule>")
     */
    public $rules;

    /**
     * @Type("string")
     */
    public $derivedFrom;

    /**
     * @Type("string")
     */
    public $bsbAccountNumber;

    /**
     * @Type("string")
     */
    public $calculationAccumulator;

    /**
     * @Type("string")
     */
    public $debitCostCentreRule;

    /**
     * @Type("ArrayCollection<Ipayroll\Model\PayElementRate>")
     */
    public $rates;

    /**
     * @Type("string")
     */
    public $excessRedundancy;

    /**
     * @Type("string")
     */
    public $customField;
}