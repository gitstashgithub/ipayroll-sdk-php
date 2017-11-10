<?php

namespace Ipayroll\Rest;

use Ipayroll\Http\Requester;
use Ipayroll\Rest\Requester\all;
use Ipayroll\Rest\Requester\get;

class EmployeeLeaveBalancesApi extends Api
{
    use all, get;

    protected $url;
    protected $resource = 'Ipayroll\Model\LeaveBalance';
    protected $resources = 'Ipayroll\Model\EmployeeLeaveBalances';

    public function __construct (Requester $requester, $employeeId)
    {
        parent::__construct ($requester);
        $this->url = sprintf('/api/v1/employees/%s/leaves/balances', $employeeId);
    }
}