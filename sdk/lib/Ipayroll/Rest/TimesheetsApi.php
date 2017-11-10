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

    public function delete_transaction($timesheet_id, $transaction_id)
    {
        return $this->transactions($timesheet_id) . delete($transaction_id);
    }

    public function transactions($timesheet_id)
    {
        return new TimesheetTransactionsApi($this->requester, $timesheet_id);
    }

    public function getByPayrollId($timesheet_id, $payroll_id)
    {
        $url = sprintf('/api/v1/timesheets/%s/payrolls/%s', $timesheet_id, $payroll_id);
        $this->requester->get($url)->asOne($this->resources);
    }

}
