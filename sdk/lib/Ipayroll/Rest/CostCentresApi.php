<?php

namespace Ipayroll\Rest;

use Ipayroll\Rest\Requester\all;
use Ipayroll\Rest\Requester\create;
use Ipayroll\Rest\Requester\get;

class CostCentresApi extends Api
{
    use all, get, create;

    protected $url = "/api/v1/costcentres";
    protected $resource = 'Ipayroll\Model\CostCentre';
    protected $resources = 'Ipayroll\Model\CostCentres';

}