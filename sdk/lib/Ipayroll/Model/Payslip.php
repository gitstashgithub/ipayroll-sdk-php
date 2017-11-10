<?php

namespace Ipayroll\Model;

use JMS\Serializer\Annotation\Type;

class Payslip extends Resource
{
    /**
     * @Type("double")
     */
    public $totalPayments;

    /**
     * @Type("double")
     */
    public $overpayment;

    /**
     * @Type("double")
     */
    public $taxCredit;

    /**
     * @Type("array")
     */
    public $yearToDateTotals;

    /**
     * @Type("double")
     */
    public $nettPay;

    /**
     * @Type("string")
     */
    public $abn;

    /**
     * @Type("string")
     */
    public $payslipMessage;

    /**
     * @Type("ArrayCollection<Ipayroll\Model\PayslipPayrollEmployeeTransaction>")
     */
    public $deductions;

    /**
     * @Type("ArrayCollection<Ipayroll\Model\PayslipPayrollEmployeeTransaction>")
     */
    public $otherBenefits;

    /**
     * @Type("ArrayCollection<Ipayroll\Model\PayslipLeaveBalance>")
     */
    public $leaveBalances;

    /**
     * @Type("Ipayroll\Model\Timesheet")
     */
    public $timesheet;

    /**
     * @Type("ArrayCollection<Ipayroll\Model\TimesheetTransaction>")
     */
    public $payments;

    /**
     * @Type("Ipayroll\Model\PayslipPayroll")
     */
    public $payroll;
}