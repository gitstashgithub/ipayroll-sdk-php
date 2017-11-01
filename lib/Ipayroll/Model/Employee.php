<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Employee extends Resource
{

    /**
     * @Type("string")
     */
    public $employeeId;

    /**
     * @Type("string")
     */
    public $surname;

    /**
     * @Type("string")
     */
    public $firstNames;

    /**
     * @Type("string")
     */
    public $startDate;

    /**
     * @Type("string")
     */
    public $birthDate;

    /**
     * @Type("string")
     */
    public $paidToTate;

    /**
     * @Type("string")
     */
    public $defaultCostCentre;

    /**
     * @Type("string")
     */
    public $email;

    /**
     * @Type("string")
     */
    public $phone;

    /**
     * @Type("string")
     */
    public $title;

    /**
     * @Type("string")
     */
    public $workState;

    /**
     * @Type("string")
     */
    public $gender;

    /**
     * @Type("string")
     */
    public $payFrequency;

    /**
     * @Type("string")
     */
    public $fullTimeHoursWeek;

    /**
     * @Type("string")
     */
    public $organisation;

    /**
     * @Type("string")
     */
    public $paymentMethod;

    /**
     * @Type("string")
     */
    public $bankAccountNumber;

    /**
     * @Type("string")
     */
    public $taxNumber;

    /**
     * @Type("string")
     */
    public $finishDate;

    /**
     * @Type("string")
     */
    public $terminationReason;

    /**
     * @Type("string")
     */
    public $taxCode;

    /**
     * @Type("string")
     */
    public $taxScale;

    /**
     * @Type("string")
     */
    public $kiwiSaverRate;

    /**
     * @Type("string")
     */
    public $employerSubsidy;

    /**
     * @Type("string")
     */
    public $kiwiSaverOptOutDate;

    /**
     * @Type("string")
     */
    public $existingKiwiSaverMember;

    /**
     * @Type("string")
     */
    public $deathBenefitSurname;

    /**
     * @Type("string")
     */
    public $deathBenefitFirstName;

    /**
     * @Type("string")
     */
    public $deathBenefitRecipient;

    /**
     * @Type("string")
     */
    public $esctRate;

    /**
     * @Type("string")
     */
    public $specialTax;

    /**
     * @Type("string")
     */
    public $specialEarnerLevy;

    /**
     * @Type("string")
     */
    public $specialExtraPayRate;

    /**
     * @Type("string")
     */
    public $specialStudentLoan;

    /**
     * @Type("string")
     */
    public $userDefinedGroup;

    /**
     * @Type("string")
     */
    public $isHelpDebt;

    /**
     * @Type("string")
     */
    public $isMedicareLevyVariationDeclaration;

    /**
     * @Type("string")
     */
    public $isHasSpouse;

    /**
     * @Type("string")
     */
    public $isIncomeLessThanRelevantAmount;

    /**
     * @Type("string")
     */
    public $isPayrollTaxExempt;

    /**
     * @Type("string")
     */
    public $isSfssDebt;

    /**
     * @Type("string")
     */
    public $dependentChildren;

    /**
     * @Type("string")
     */
    public $surchargeIncrease;

    /**
     * @Type("string")
     */
    public $preferredName;

    /**
     * @Type("string")
     */
    public $proprietorStatus;

    /**
     * @Type("string")
     */
    public $contractorsAbn;

    /**
     * @Type("Ipayroll\Model\Address")
     */
    public $address;

    public function __toString()
    {
        return (String)print_r($this, true);
    }

}