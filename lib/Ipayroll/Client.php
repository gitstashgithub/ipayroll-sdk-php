<?php

namespace Ipayroll;

use Ipayroll\Http\Oauth2Session;
use Ipayroll\Rest\CostCentresApi;
use Ipayroll\Rest\EmployeeCustomFieldsApi;
use Ipayroll\Rest\EmployeeLeaveBalancesApi;
use Ipayroll\Rest\EmployeeLeaveRequestsApi;
use Ipayroll\Rest\EmployeePayRatesApi;
use Ipayroll\Rest\EmployeesApi;
use Ipayroll\Rest\EmployeesLeaveRequestsApi;
use Ipayroll\Rest\LeaveRequestsApi;
use Ipayroll\Rest\PayElementsApi;
use Ipayroll\Rest\PayrollsApi;


class Client
{
    const AUTHORIZATION_URI_DEFAULT = '/oauth/authorize';
    const TOKEN_CREDENTIAL_URI_DEFAULT = '/oauth/token';
    const REFRESH_TOKEN_URI_DEFAULT = '/oauth/token';

    const SCOPE_DEFAULT = 'leavebalances payelements payrates leaverequests employees costcentres payslips timesheets payrolls';

    const API_BASE_URL_DEFAULT = 'http://secure2.Ipayroll.co.nz';

    private $session;

    public function __construct($client_id, $client_secret, $redirect_uri, array $options = [])
    {

        $config = array_merge($this->defaultArray(), $options);


        $this->session = new Oauth2Session(
            $config['baseUrl'], $config['accessToken'], $config['accessTokenUpdater'],
            ['clientId' => $client_id,
                'clientSecret' => $client_secret,
                'redirectUri' => $redirect_uri,
                'scopes' => $config['scope'],
                'urlAuthorize' => $config['baseUrl'] . $config['authorization_uri'],
                'urlAccessToken' => $config['baseUrl'] . $config['token_credential_uri'],
                'urlResourceOwnerDetails' => 'http://brentertainment.com/oauth2/lockdin/resource']
        );
    }

    private function defaultArray()
    {
        return [
            'accessToken' => null,
            'scope' => self::SCOPE_DEFAULT,
            'baseUrl' => self::API_BASE_URL_DEFAULT,
            'authorization_uri' => self::AUTHORIZATION_URI_DEFAULT,
            'token_credential_uri' => self::TOKEN_CREDENTIAL_URI_DEFAULT,
            'refresh_token_uri' => self::REFRESH_TOKEN_URI_DEFAULT,
            'accessTokenUpdater' => null,
        ];
    }

    public function &oauth2()
    {
        return $this->session;
    }

    public function isConnected()
    {
        return $this->oauth2()->isConnected();
    }

    public function costCentres()
    {
        return new CostCentresApi($this->session->getRequester());
    }

    public function employees()
    {
        return new EmployeesApi($this->session->getRequester());
    }

    public function employeeCustomfields($employeeId)
    {
        return new EmployeeCustomFieldsApi($this->session->getRequester(), $employeeId);
    }

    public function employeePayrates($employeeId)
    {
        return new EmployeePayRatesApi($this->session->getRequester(), $employeeId);
    }

    public function employeeLeaveBalances($employeeId)
    {
        return new EmployeeLeaveBalancesApi($this->session->getRequester(), $employeeId);
    }

    public function employeeLeaveRequests($employeeId)
    {
        return new EmployeeLeaveRequestsApi($this->session->getRequester(), $employeeId);
    }

    # def employeesPayslips(self, employee_id):
    #     return EmployeesPayslipsEndpoint(self.__session.requester(), employee_id)

    public function leaveRequests()
    {
        return new LeaveRequestsApi($this->session->getRequester());
    }

    public function payElements()
    {
        return new PayElementsApi($this->session->getRequester());
    }

    public function payrolls()
    {
        return new PayrollsApi($this->session->getRequester());
    }

    public function withAccessTokenUpdater($accessTokenUpdater)
    {
        $this->session->withAccessTokenUpdater($accessTokenUpdater);
    }

//    public function payrollCurrentPayslips()
//    {
//        return new PayrollPayslipsApi($this->session->getRequester(), 'current');
//    }
//
//    public function payrollPayslips($payrollId    )
//    {
//        return new PayrollPayslipsApi($this->session->getRequester(), $payrollId);
//    }

}