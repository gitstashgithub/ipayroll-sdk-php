<?php

namespace Ipayroll\Rest;

use Ipayroll\Http\Requester;
use Ipayroll\Rest\Requester\all;
use Ipayroll\Rest\Requester\get;

class PayrollPayslipsApi extends Api
{
    use all, get;

    protected $resource = 'Ipayroll\Model\Payslip';
    protected $resources = 'Ipayroll\Model\Payslips';

    public function __construct (Requester $requester, $payrollId)
    {
        parent::__construct ($requester);
        $this->url = sprintf('/api/v1/payrolls/%s/payslips', $payrollId);
    }


}