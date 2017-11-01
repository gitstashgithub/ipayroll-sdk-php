<?php

namespace Ipayroll\Rest;

use Ipayroll\Rest\Requester\all;
use Ipayroll\Rest\Requester\get;

class LeaveRequestsApi extends Api
{
    use all, get;

    protected $url = '/api/v1/leaves/requests';
    protected $resource = 'Ipayroll\Model\LeaveRequest';
    protected $resources = 'Ipayroll\Model\LeaveRequests';

    public function listOutstanding()
    {
        $this->requester->get($this->url . '/current')->asOne($this->resources);
    }

}