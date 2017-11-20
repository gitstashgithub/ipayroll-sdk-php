# Introduction

The iPay`roll Restful Api allows you manipulate some of your iPayroll data through
third party application. In order to start a quick php project with iPayroll
Restful api, we created the iPayroll php sdk project to help you quickly start
a project to interact with iPayroll Restful API.

## Documentations

All of iPayroll Restful Api documentation can be found at [here](http://dev.ipayroll.co.nz).


## Usage

### Configuration

```php
use Ipayroll\Client;
$clientId = 'd908376c-3d1b-41a9-8358-1fad946e0c57';
$clientSecret = 'GwUmPqD8s7mGj4d';
$redirectUrl = 'http://127.0.0.1:8000/ipayroll/redirect';
$client = new Client($clientId, 
    $clientSecret,
    $redirectUrl
 );
```

### Authentication

#### Oauth2 Authorization code grant

```php
public function connection()
{
    $authorizationUrl = $client->oauth2()->getAuthorizationUrl();
    return $this->redirect($authorizationUrl);
}
```
When the redirect_uri is called with the code parameter
```php
ppublic function redirection(Request $request, SessionInterface $session)
{
    $code = $request->get('code');
    $accessToken = $client->oauth2()->exchangeAuthorizationCodeForAccessToken($code);
}
```
#### Oauth2 Refresh token grant
```php
 $accessToken = $client->oauth2()->connectWithRefreshToken('dd4bb058-ecca-4bba-a0fc-44e5809e2d26');
```

#### Store access token:
```php
class TokenUpdater
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }


    public function update($accessToken)
    {
        $this->session->set('accessToken', $accessToken);
        echo $accessToken;
    }

    public function getAccessToken()
    {
        return $this->session->get('accessToken');
    }

}
```
```php
$client = new Client('d908376c-3d1b-41a9-8358-1fad946e0c57', 
    'GwUmPqD8s7mGj4d',
    'http://127.0.0.1:8000/ipayroll/redirect', 
    [ 'baseUrl' => 'http://localhost:8080/ipayroll',
        'accessToken' => $accessToken,
        'accessTokenUpdater' => new TokenUpdater($session)
]);

```
### Request API

#### Get a list of resources
Get the first page of 20 elements
```php
client.employees().all()
```
Get a specific page
```php
client.employees().all(page=2, size=10)
```
#### Get a resource
```php
cost_center_id = '7242'
client.costCentres.get('7242')
```

#### Create resources
```php
$cc = new CostCentre();
$cc->code = ("codePhp-" . uniqid(rand()));
$cc->description = "From php";

$cc2 = new CostCentre();
$cc2->code = ("codePhp-" . uniqid(rand()));
$cc2->description = "From php";

$ccs = [$cc, $cc2];
return $client->costCentres()->create($ccs);
```

#### Update a resource
```php
$employee = $client->employees()->get('141228');
$employee->title = "codePhp-" . uniqid(rand());
$client->employees()->update($employee);
```

#### Delete a resource
```php
$client->timesheets()->transactions(653972).delete('19');
```

#### All requestable resources
```php
client.cost_centres()
client.employees()
client.employeeCustomFields($employeeId)
client.employeeLeaveBalances($employeeId)
client.employeeLeaveRequests($employeeId)
client.employeePayrates($employeeId)
client.leaveRequests()
client.payElements()
client.payslips()
client.timesheets()
client.timesheetsTransactions($timesheetsId)
client.payrolls()
```

## Development
```bash
$ php composer.phar install
```
### Start symphony exemple project
php bin/console server:run