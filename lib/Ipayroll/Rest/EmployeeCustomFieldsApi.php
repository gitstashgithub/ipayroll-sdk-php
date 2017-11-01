<?php

namespace Ipayroll\Rest;

use Ipayroll\Http\Requester;
use Ipayroll\Rest\Requester\all;
use Ipayroll\Rest\Requester\get;

class EmployeeCustomFieldsApi extends Api
{
    use all, get;

    protected $url;
    protected $resource = 'Ipayroll\Model\EmployeeCustomField';
    protected $resources = 'Ipayroll\Model\EmployeeCustomFields';

    public function __construct (Requester $requester, $employeeId)
    {
        parent::__construct ($requester);
        $this->url = sprintf('/api/v1/employees/%d/customfields', $employeeId);
    }

    public function allByCategory($categoryId)
    {
        return $this->requester->get($this->url . '/' . $categoryId)->asOne($this->resources);
    }

    public function get($categoryId, $id)
    {
        return $this->requester->get($this->url . '/' . $categoryId . '/' . $id)->asOne($this->resource);
    }

}
