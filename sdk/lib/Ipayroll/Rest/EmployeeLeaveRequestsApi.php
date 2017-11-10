<?php

namespace Ipayroll\Rest;

use Ipayroll\Http\Requester;
use Ipayroll\Rest\Requester\all;
use Ipayroll\Rest\Requester\get;

class EmployeeLeaveRequestsApi extends Api
{
    use all, get;

    protected $url;
    protected $resource = 'Ipayroll\Model\LeaveRequest';
    protected $resources = 'Ipayroll\Model\EmployeeLeaveRequests';

    public function __construct (Requester $requester, $employeeId)
    {
        parent::__construct ($requester);
        $this->url = sprintf('/api/v1/employees/%s/leaves/requests', $employeeId);
    }

    public function list_outstanding() {
        $this->requester->get($this->url . '/current')->asOne($this->resources);
    }
}
