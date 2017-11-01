<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ipayroll\Client;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class IpayrollController extends Controller
{
    static $client;

    /**
     * @Route("/ipayroll", name="home")
     */
    public function home(Request $request, SessionInterface $session)
    {
        $client = $this->getClient($session);
        return $this->render('ipayroll/home.html.twig', array(
            'accessToken' => $client->oauth2()->getAccessToken(),
            'isConnected' => $client->isConnected()
        ));
    }

    /**
     * @Route("/ipayroll/connection", name="connection")
     */
    public function connection(Request $request, SessionInterface $session)
    {
        $client = $this->getClient($session);
        $authorizationUrl = $client->oauth2()->getAuthorizationUrl();
        return $this->redirect($authorizationUrl);
    }

    /**
     * @Route("/ipayroll/redirect", name="redirect")
     */
    public function redirection(Request $request, SessionInterface $session)
    {
        $client = $this->getClient($session);
        $code = $request->get('code');
        $accessToken = $client->oauth2()->exchangeAuthorizationCodeForAccessToken($code);
        $session->set('accessToken', $accessToken);
        return $this->redirectToRoute('home', array('accessToken' => $accessToken));
    }

    /**
     * @Route("/ipayroll/costcentres", name="costcentres")
     */
    public function costcentres(Request $request, SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list  = $client->costCentres()->all();
        $get  = $client->costCentres()->get('12590');
        return $this->toListPage($list, $get);
    }

    /**
     * @Route("/ipayroll/employees", name="employees")
     */
    public function employees(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $employees  = $client->employees()->all();
        $employee  = $client->employees()->get('07-610');
        return $this->toListPage($employees, $employee);

    }

    /**
     * @Route("/ipayroll/notfound", name="notfound")
     */
    public function notfound(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $employees  = $client->employees()->all();
        $employee  = $client->employees()->get('13');
        return $this->toListPage($employees, $employee);

    }

    /**
     * @Route("/ipayroll/employeeCustomfields", name="employeeCustomfields")
     */
    public function employeeCustomfields(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list  = $client->employeeCustomfields('109')->all();
        $get  = $client->employeeCustomfields('109')->get('6', '6586');
        return $this->toListPage($list, $get);
    }

    /**
     * @Route("/ipayroll/employeePayrates", name="employeePayrates")
     */
    public function employeePayrates(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list  = $client->employeePayrates('109')->all();
        $get  = $client->employeePayrates('109')->get('3');
        return $this->toListPage($list, $get);

    }

    /**
     * @Route("/ipayroll/employeeLeaveBalances", name="employeeLeaveBalances")
     */
    public function employeeLeaveBalances(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list  = $client->employeeLeaveBalances('109')->all();
        $get  = $client->employeeLeaveBalances('109')->get('In%20Service%20Training');
        return $this->toListPage($list, $get);
    }

    /**
     * @Route("/ipayroll/employeeLeaveRequests", name="employeeLeaveRequests")
     */
    public function employeeLeaveRequests(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list  = $client->employeeLeaveRequests('14')->all();
        $get  = $client->employeeLeaveRequests('14')->get('1069');
        return $this->toListPage($list, $get);
    }

    # def employeesPayslips(self, employee_id):
    #     return EmployeesPayslipsEndpoint(self.__session.requester(), employee_id)

    /**
     * @Route("/ipayroll/leaveRequests", name="leaveRequests")
     */
    public function leaveRequests(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list  = $client->leaveRequests()->all();
        $get  = $client->leaveRequests()->get('1069');
        return $this->toListPage($list, $get);
    }


    /**
     * @Route("/ipayroll/payElements", name="payElements")
     */
    public function payElements(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list  = $client->payElements()->all();
        $get  = $client->payElements()->get('ACC%20FIRST%20WEEK');
        return $this->toListPage($list, $get);
    }

    /**
     * @Route("/ipayroll/payrolls", name="payrolls")
     */
    public function payrolls(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list  = $client->payrolls()->all();
        $get  = $client->payrolls()->get('0003');

        return $this->toListPage($list, $get);
    }

//    /**
//     * @Route("/ipayroll/payrollCurrentPayslips", name="payrollCurrentPayslips")
//     */
//    public function payrollCurrentPayslips(SessionInterface $session)
//    {
//        $client = $this->getClient($session);
//        $list  = $client->payrollCurrentPayslips()->all();
//        return $this->toListPage($list, null);
//    }
//
//    /**
//     * @Route("/ipayroll/payrollsPayslips", name="payrollsPayslips")
//     */
//    public function payrollsPayslips(SessionInterface $session)
//    {
//        $client = $this->getClient($session);
//        $list  = $client->payrollCurrentPayslips('0003')->all();
//        return $this->toListPage($list, null);
//    }



    function toListPage($list, $get) {
        return $this->render('ipayroll/list.html.twig', array(
            'object' => 'employee',
            'list' => $list,
            'get' => $get
        ));
    }


    function getClient(SessionInterface $session)
    {
        $accessToken = $session->get('accessToken');
        return new Client('d908376c-3d1b-41a9-8358-1fad946e0c57', 'GwUmPqD8s7mGj4d',
                'http://127.0.0.1:8000/ipayroll/redirect', $accessToken = $accessToken,
                $scope =Client::SCOPE_DEFAULT,  $baseUrl = 'http://localhost:8080/ipayroll');

    }

}
