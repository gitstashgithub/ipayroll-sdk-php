<?php

namespace Ipayroll\Rest;

use Ipayroll\Rest\Requester\all;
use Ipayroll\Rest\Requester\create;
use Ipayroll\Rest\Requester\get;

class PayrollsApi extends Api
{
    use all, get, create;

    protected $url = '/api/v1/payrolls';
    protected $resource = 'Ipayroll\Model\Payroll';
    protected $resources = 'Ipayroll\Model\Payrolls';


    public function getCurrent()
    {
        return $this->get('current');
    }

}