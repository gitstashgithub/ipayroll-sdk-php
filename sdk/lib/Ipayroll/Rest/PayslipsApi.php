<?php

namespace Ipayroll\Rest;

use Ipayroll\Http\Requester;
use Ipayroll\Rest\Requester\all;

class PayslipsApi extends Api
{
    use all;

    protected $url = '/api/v1/payslips';
    protected $resource = 'Ipayroll\Model\Payslip';
    protected $resources = 'Ipayroll\Model\Payslips';

    public function getByEmployeeId($employee_id)
    {
        $url = sprintf('%s/employees/%s', $this->url, $employee_id);
        return $this->requester->get($url)->asOne($this->resource);

    }

    public function listByPayroll($payroll_id)
    {
        $url = sprintf('%s/%s', $this->url, $payroll_id);
        return $this->requester->get($url)->asOne($this->resource);

    }

    public function getByPayrollAndByEmployeeId($payroll_id, $employee_id)
    {
        $url = sprintf('%s/%s/employees/%s', $this->url, $payroll_id, $employee_id);
        return $this->requester->get($url)->asOne($this->resource);
    }

}