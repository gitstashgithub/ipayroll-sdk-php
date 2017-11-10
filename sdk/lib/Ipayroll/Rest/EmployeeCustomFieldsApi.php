<?php

namespace Ipayroll\Rest;

use Ipayroll\Http\Requester;
use Ipayroll\Rest\Requester\all;

class EmployeeCustomFieldsApi extends Api
{
    use all;

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
        $url = sprintf('%s/%s', $this->url, $categoryId);
        return $this->requester->get($url)->asOne($this->resources);
    }

    public function getByCategoryAndId($categoryId, $id)
    {
        $url = sprintf('%s/%s/%s', $this->url, $categoryId, $id);
        return $this->requester->get($url)->asOne($this->resource);
    }

}
