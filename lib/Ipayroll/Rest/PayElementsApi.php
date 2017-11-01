<?php

namespace Ipayroll\Rest;

use Ipayroll\Rest\Requester\all;
use Ipayroll\Rest\Requester\get;

class PayElementsApi extends Api
{
    use all, get;

    protected $url = '/api/v1/payelements';
    protected $resource = 'Ipayroll\Model\PayElement';
    protected $resources = 'Ipayroll\Model\PayElements';

}
