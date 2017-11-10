<?php

namespace Ipayroll\Rest;

use Ipayroll\Http\Requester;
use Ipayroll\Rest\Requester\all;
use Ipayroll\Rest\Requester\get;

class EmployeePayRatesApi extends Api
{
    use all, get;

    protected $url;
    protected $resource = 'Ipayroll\Model\PayRate';
    protected $resources = 'Ipayroll\Model\EmployeePayRates';

    public function __construct(Requester $requester, $employeeId)
    {
        parent::__construct($requester);
        $this->url = sprintf('/api/v1/employees/%s/payrates', $employeeId);
    }

}