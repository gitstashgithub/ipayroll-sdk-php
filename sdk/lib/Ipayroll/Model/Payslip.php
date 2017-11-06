<?php

namespace Ipayroll\Model;


class Payslip extends Resource
{
    public $totalPayments;
    public $overpayment;
    public $taxCredit;
    public $yearToDateTotals;// = fields.Collection(YearToDateTotalsEntry)
    public $nettPay;
    public $abn;
    public $payslipMessage;
    public $deductions;// = fields.Collection(PayslipPayrollEmployeeTransaction)
    public $otherBenefits;// = fields.Collection(PayslipPayrollEmployeeTransaction)
    public $leaveBalances;// = fields.Collection(PayslipLeaveBalance)
    public $timesheet;// = fields.Embedded(Timesheet)
    public $payments;// = fields.Collection(PayslipTransaction)
    public $payroll;// = fields.Embedded(PayslipPayroll)
}