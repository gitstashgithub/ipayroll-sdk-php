<?php

namespace Ipayroll\Rest;

use Ipayroll\Rest\Requester\all;
use Ipayroll\Rest\Requester\get;
use Ipayroll\Rest\Requester\create;
use Ipayroll\Rest\Requester\update;

class EmployeesApi extends Api
{
    use all, get, create, update;

    protected $url = "/api/v1/employees";
    protected $resource = 'Ipayroll\Model\Employee';
    protected $resources = 'Ipayroll\Model\Employees';

}