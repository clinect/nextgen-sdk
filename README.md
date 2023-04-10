# NextGen SDK

## • Installation

Use Composer to install this SDK.

```
composer require clinect/nextgen-sdk
```

## • Connector

Instantiate the connector by passing the required parameters, with that you can now retrieve and send the requests.

```php

use Clinect\NextGen\NextGen;

$nextGenConnector = new NextGen(
    clientId: 'client-id-123',
    secret: 'secret-123',
    siteId: 'site-id-123',
    enterpriseId: 'enterprise-id-123',
    practiceId: 'practice-id-123',
);
```
## • Configuration


## • Requests
Currently, there are 8 request classes, you have two options to use them:
```php
Request         | Via Request                       | Via Connector
Appointment     - (new AppointmentRequests)         - $nextGenConnector->appointments()
Chart           - (new ChartRequests)               - $nextGenConnector->charts()
Department      - (new DepartmentRequests)          - $nextGenConnector->departments()
Health History  - (new HealthHistoryFormRequests)   - $nextGenConnector->healthHistoryForms()
Insurance       - (new InsuranceRequests)           - $nextGenConnector->insurances()
Patient         - (new PatientRequests)             - $nextGenConnector->patients()
Person          - (new PersonRequests)              - $nextGenConnector->persons()
Master          - (new MasterRequests)              - $nextGenConnector->master()
```


### Requests methods

#### • GET Method
<details>
  <summary>Usage</summary>
    
In order to use a get request you just have to append ``->get()`` to the request
```php
// This retrieves all of the persons data. Endpoint:  '/persons/{$personId}
    
// Via Request
    $request = (new PersonRequests)->get();
    // With Id
    $request = (new PersonRequests($personId))->get();
    
// Via Connector
    $request = $nextGenConnector->persons()->get();
    // With Id
    $request = $nextGenConnector->persons($personId)->get();
```

<details>
  <summary>Nested get() requests:</summary>
    
Requests can also be connected dependent on their api endpoints.
 
```php
// Endpoint: '/persons/{$personId}/chart/balances/{$balanceId - this is optional}'
// This request retrieves person's/patient's balances

// Via Request:
$request = (new PersonRequests($personId))->balances($balanceId)->get();

// Via Connector:
$request = $connector->persons($personId)->balances($balanceId)->get();
```
  
 ```php
 
// Endpoint: '/persons/{$personId}/insurances/{insuranceId}/cards/{cardId}/front'
// This request retrieves the front part of the person's insurance card

// Via Request:
$request = (new PersonRequests($personId))
            ->insurances($insuranceId)
            ->cards($cardId)
            ->front()
            ->get();

// Via Connector:
$request = $connector->persons($personId)
            ->insurances($insuranceId)
            ->cards($cardId)
            ->front()
            ->get();
```

You can also check our tests to see more examples:

``Via Request: /tests/Feature/Requests/``

``Via Connector: /tests/Feature/Connector/Requests/``
    
All tests corresponds to a specific api endpoint, the id's are all **optional**. If you want to retrieve all of the data; skip the id's, and if you want to retrieve a specific data of the request; pass the id to the request.
    
    
</details>
    
<details>
  <summary>All GET Requests</summary>
</details>
    
</details>

#### • POST Method
<details>
  <summary>Usage</summary>
</details>

#### • PUT Method
<details>
  <summary>Usage</summary>
</details>

#### • PATCH Method
<details>
  <summary>Usage</summary>
</details>

#### • DELETE Method
<details>
  <summary>Usage</summary>
</details>

### Sending the Request
Once you have the request class and the connector class, you can now start sending the request using the ``send()`` or ``sendAsync()`` methods from your ``$nextGenConnector``.

When using the ``send()`` method, you will receive a response class.


<details>
  <summary>Via Request:</summary>
 
```php
use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\PersonRequests;

$request = (new PersonRequests)->get();
$response = $nextGenConnector->send($request);

// With ID's - To get only the specific data, simply pass the id to the request.
$request = (new PersonRequests($personId))->get();
$response = $nextGenConnector->send($request);
```

</details>

<details>
  <summary>Via Connector:</summary>
 
```php
use Clinect\NextGen\NextGen;

$request = $nextGenConnector->persons()->get();
$response = $nextGenConnector->send($request);

// With ID's - To get only the specific data, simply pass the id to the request.
$request = $nextGenConnector->persons($personId)->get();
$response = $nextGenConnector->send($request);
```

</details>

Saloon supports asynchronous requests, to send those you will have to use the ``sendAsync()`` method, and you will receive an instance of PromiseInterface. _Please see Response chapter to see how the promise should be handled_.

<details>
  <summary>Via Request:</summary>
  
```php
use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\PersonRequests;

$request = (new PersonRequests($personId))->get();
$promise = $nextGenConnector->sendAsync($request);
```

</details>

<details>
  <summary>Via Connector:</summary>
  
```php
use Clinect\NextGen\NextGen;

$request = $nextGenConnector->persons($personId)->get();
$promise = $nextGenConnector->sendAsync($request);
```

</details>

## • Response
You can handle the response of your request depending on what method you've used in sending the request

<details>
  <summary>send(): Response</summary>

```php
$response = $nextGenConnector->send($request);

$body = $response->body();
$decodedBody = $response->json();
```

</details>

<details>
  <summary>sendAsync(): PromiseInterface</summary>

```php
$promise = $nextGenConnector->sendAsync($request);
$promise
    ->then(function (Response $response) {
        // Handle successful response
    })
    ->otherwise(function (Exception $exception) {
        // Handle failed request
    });
```

</details>
