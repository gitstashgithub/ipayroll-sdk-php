<?php

namespace Ipayroll\Rest;

use Ipayroll\Rest\Requester\delete;

class TimesheetTransactionsApi extends Api
{
    use delete;

    protected $url;
    protected $resource = 'Ipayroll\Model\TimesheetTransaction';

    public function __construct(Requester $requester, $timesheet_id)
    {
        parent::__construct($requester);
        $this->url = sprintf('/api/v1/timesheets/%d/transactions', $timesheet_id);
    }

}
