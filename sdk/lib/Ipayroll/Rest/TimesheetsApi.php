<?php

namespace Ipayroll\Rest;

use Ipayroll\Rest\Requester\all;
use Ipayroll\Rest\Requester\get;
use Ipayroll\Rest\Requester\create;

class TimesheetsApi extends Api
{
    use all, get, create;

    protected $url = '/api/v1/timesheets';
    protected $resource = 'Ipayroll\Model\Timesheet';
    protected $resources = 'Ipayroll\Model\Timesheets';

//    public function getByPayrollNumber()
//    {
//        $this->requester->get($this->url . '/current')->asOne($this->resources);
//    }

//    public function deleteTimesheetTransaction()
//    {
//        $this->requester->delete($this->url . '/current')->asOne($this->resources);
//    }
}
