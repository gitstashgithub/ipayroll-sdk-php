<?php

namespace AppBundle\Controller;

use Ipayroll\Client;
use Ipayroll\Http\Oauth2AccessToken;
use Ipayroll\Model\CostCentre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class IpayrollController extends Controller
{
    static $client;

    /**
     * @Route("/ipayroll", name="home")
     */
    public function home(Request $request, SessionInterface $session)
    {
        $tu = new TokenUpdater($session);
        $client = $this->getClient($session);
        return $this->render('ipayroll/home.html.twig', array(
            'accessToken' => $tu->getAccessToken(),
            'isConnected' => $client->isConnected()
        ));
    }

    /**
     * @Route("/ipayroll/connectWithToken", name="connectWithToken")
     */
    public function connectWithToken(Request $request, SessionInterface $session)
    {
        $client = $this->getClient($session);
        $accessToken = $client->oauth2()->connectWithRefreshToken('dd4bb058-ecca-4bba-a0fc-44e5809e2d26');
        $accessToken =  $client->oauth2()->connectWithAccessToken($accessToken);
        return $this->redirectToRoute('home');
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
//        $session->set('accessToken', $accessToken);
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/ipayroll/costcentres", name="costcentres")
     */
    public function costcentres(Request $request, SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list = $client->costCentres()->all();
        $get = $client->costCentres()->get('12590');
        $created = $this->createCostCentres($client);
        return $this->toListPage($list, $get, $created);
    }

    public function createCostCentres($client)
    {
        $cc = new CostCentre();
        $cc->code = ("codePhp-" . uniqid(rand()));
        $cc->description = "From php";

        $cc2 = new CostCentre();
        $cc2->code = ("codePhp-" . uniqid(rand()));
        $cc2->description = "From php";

        $ccs = [$cc, $cc2];
        return $client->costCentres()->create($ccs);
    }

    /**
     * @Route("/ipayroll/employees", name="employees")
     */
    public function employees(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $employees = $client->employees()->all();
        $employee = $client->employees()->get('141228');
        $employee->title = "codePhp-" . uniqid(rand());
        $client->employees()->update($employee);
        $updated = $client->employees()->get('141228');
        return $this->toListPage($employees, $employee, null, $updated);

    }

    /**
     * @Route("/ipayroll/notfound", name="notfound")
     */
    public function notfound(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $employees = $client->employees()->all();
        $employee = $client->employees()->get('13');
        return $this->toListPage($employees, $employee);
    }

    /**
     * @Route("/ipayroll/employeeCustomfields", name="employeeCustomfields")
     */
    public function employeeCustomfields(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list = $client->employeeCustomfields('109')->all();
        $get = $client->employeeCustomfields('109')->getByCategoryAndId('6', '6586');
        return $this->toListPage($list, $get);
    }

    /**
     * @Route("/ipayroll/employeePayrates", name="employeePayrates")
     */
    public function employeePayrates(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list = $client->employeePayrates('109')->all();
        $get = $client->employeePayrates('109')->get('3');
        return $this->toListPage($list, $get);

    }

    /**
     * @Route("/ipayroll/employeeLeaveBalances", name="employeeLeaveBalances")
     */
    public function employeeLeaveBalances(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list = $client->employeeLeaveBalances('109')->all();
        $get = $client->employeeLeaveBalances('109')->get('In%20Service%20Training');
        return $this->toListPage($list, $get);
    }

    /**
     * @Route("/ipayroll/employeeLeaveRequests", name="employeeLeaveRequests")
     */
    public function employeeLeaveRequests(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list = $client->employeeLeaveRequests('14')->all();
        $get = $client->employeeLeaveRequests('14')->get('1069');
        return $this->toListPage($list, $get);
    }

    /**
     * @Route("/ipayroll/leaveRequests", name="leaveRequests")
     */
    public function leaveRequests(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list = $client->leaveRequests()->all();
        $get = $client->leaveRequests()->get('1069');
        return $this->toListPage($list, $get);
    }

    /**
     * @Route("/ipayroll/payElements", name="payElements")
     */
    public function payElements(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list = $client->payElements()->all();
        $get = $client->payElements()->get('ACC%20FIRST%20WEEK');
        return $this->toListPage($list, $get);
    }

    /**
     * @Route("/ipayroll/payslips", name="payslips")
     */
    public function payslips(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list = $client->payslips()->all();
        $get = $client->payslips()->getByEmployeeId('977659');
        $client->payslips()->listByPayroll('0130');
        $client->payslips()->getByPayrollAndByEmployeeId('0130', '977659');
        return $this->toListPage($list, $get);
    }

    /**
     * @Route("/ipayroll/timesheets", name="timesheets")
     */
    public function timesheets(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list = $client->timesheets()->all();
        $get = $client->timesheets()->get(653972);
        return $this->toListPage($list, $get);
    }

    /**
     * @Route("/ipayroll/payrolls", name="payrolls")
     */
    public function payrolls(SessionInterface $session)
    {
        $client = $this->getClient($session);
        $list = $client->payrolls()->all();
        $get = $client->payrolls()->get('0003');

        return $this->toListPage($list, $get);
    }

    function toListPage($list, $get, $created=null, $updated=null)
    {
        return $this->render('ipayroll/list.html.twig', array(
            'object' => 'Resource',
            'list' => $list,
            'get' => $get,
            'created' => $created,
            'updated' => $updated
        ));
    }

    function getClient(SessionInterface $session)
    {
        $accessToken = $session->get('accessToken');
        return new Client('d908376c-3d1b-41a9-8358-1fad946e0c57', 'GwUmPqD8s7mGj4d',
            'http://127.0.0.1:8000/ipayroll/redirect', [
                'baseUrl' => 'http://localhost:8080/ipayroll',
                'accessToken' => $accessToken,
                'accessTokenUpdater' => new TokenUpdater($session)
            ]);
    }

}
