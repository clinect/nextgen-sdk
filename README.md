# NextGen SDK

## Installation

Use Composer to install this SDK.

```
composer require clinect/nextgen-sdk
```

## Connector

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
## Configuration


## Requests
Currently, there are 8 request classes, you have two options to retrieve them:
```php
Request         | Via Request                               | Via Connector
Appointment     - (new AppointmentRequests)->get()          - $nextGenConnector->appointments()->get()
Chart           - (new ChartRequests)->get()                - $nextGenConnector->charts()->get()
Department      - (new DepartmentRequests)->get()           - $nextGenConnector->departments()->get()
Health History  - (new HealthHistoryFormRequests)->get()    - $nextGenConnector->healthHistoryForms()->get()
Insurance       - (new InsuranceRequests)->get()            - $nextGenConnector->insurances()->get()
Patient         - (new PatientRequests)->get()              - $nextGenConnector->patients()->get()
Person          - (new PersonRequests)->get()               - $nextGenConnector->persons()->get()
Master          - (new MasterRequests)->get()               - $nextGenConnector->master()->get()
```

Requests can also be connected dependent on their api endpoints.

<details>
  <summary>Example nested requests:</summary>
 
  
 ```php
 
// endpoint: '/persons/{$personId}/insurances/{insuranceId}/cards/{cardId}/front'
// this request retrieves the front part of the person's insurance card

//Via Request:
$request = (new PersonRequests($personId))
            ->insurances($insuranceId)
            ->cards($cardId)
            ->front()
            ->get();

//Via Connector:
$request = $connector->persons($personId)
            ->insurances($insuranceId)
            ->cards($cardId)
            ->front()
            ->get();
```

```php
// endpoint: '/persons/{$personId}/chart/balances/{$balanceId - this is optional}'
// this request retrieves person's/patient's balances

//Via Request:
$request = (new PersonRequests($personId))->balances($balanceId)->get();

//Via Connector:
$request = $connector->persons($personId)->balances($balanceId)->get();
```

For all the possible requests, please check out our tests located in:

``Via Request: /tests/Feature/Requests/``

``Via Connector: /tests/Feature/Resources/Requests/``
</details

All tests corresponds to a specific api endpoint, the id's are all **optional**. If you want to retrieve all of the data; skip the id's, and if you want to retrieve a specific data of the request; pass the id to the request.

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

## Response
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