# NextGen PHP SDK
A extendable sdk powered by [Saloon](https://github.com/sammyjo20/saloon).

## Installation

To get started with NextGen SDK, you will need to install it through Composer.

```
$ composer require clinect/nextgen-sdk
```

> NextGen SDK supports PHP 8.1+

### Dependencies

NextGen SDK has two dependencies.

* [Saloon](https://github.com/Sammyjo20/saloon-docs) (Core php library for API integration framework)
* [Saloon Cache Plugin](https://github.com/Sammyjo20/saloon-cache-plugin) (Official cache plugin for Saloon v2)

### Using Laravel?

After the installation. Next, publish the configuration file with the following Artisan command

```
php artisan vendor:publish --tag=nextgen-config
```

## Configuration

### List of NextGen config keys:

* `client_id`
* `secret`
* `site_id`
* `enterprise_id`
* `practice_id`
* `base_url`
* `route_uri`
* `auth_uri`
* `cache_adapter` ([see more about cache adapter](https://www.google.com))

> Note: All config keys and values are required.

### Usage

```php
<?php

use Clinect\NextGen\NextGen;
use Clinect\NextGen\NextGenConfig;

$config = NextGenConfig::create([
    'client_id' => 'nextgen-client-id',
    'secret' => 'nextgen-secre',
    'site_id' => 'nextgen-site-id',
    'enterprise_id' => 'nextgen-enterprise-id',
    'practice_id' => 'nextgen-practice-id',
    'base_url' => 'nextgen-api-base-url',
    'route_uri' => 'nextgen-route-uri-endpoint',
    'auth_uri' => 'nextgen-auth-uri-endpoint',
    'cache_adapter' => [
        'type' => 'laravel-cache',

        'driver' => Illuminate\Support\Facades\Cache::class,

        'cache_type' => 'file',

        'expiry_time' => 3600,
    ],
]);

$connector = new NextGen($config);
```

## Requests

NextGen SDK request stores the information of a single API request. Within a request, you can set the HTTP Method by appending at the end of each endpoint request.

### Methods
* `get()`
* `post()`
* `put()`
* `patch()`
* `delete()`

## Usage

### GET

```php
<?php

use Clinect\NextGen\NextGen;

$connector = new NextGen(...);

// Endpoint: "/persons"
$request = $connector->persons()->get();

// Endpoint: "/persons/{id}"
$request = $connector->persons({id})->get();
```

### POST|PUT|PATCH|DELETE

```php
<?php

use Clinect\NextGen\NextGen;

$connector = new NextGen(...);

// Post
$request = $connector->persons()
    ->fill([
        'name' => 'Name',
        'provider' => 'Provider name',
    ])
    ->post();

// Put
$request = $connector->persons()
    ->fill([
        'name' => 'Name',
        'provider' => 'Provider name',
    ])
    ->put();

// Patch
$request = $connector->persons()
    ->fill([
        'name' => 'Name',
        'provider' => 'Provider name',
    ])
    ->patch();

// Delete
$request = $connector->persons({id})->delete();
```

There are three types of handling request body data.

### Using form body

```php
<?php

$request = $connector->persons()
    ->fill([
        'name' => 'Name',
        'provider' => 'Provider name',
    ])
    ->usingFormBody()
    ->post();
```

### Using json body

```php
<?php

$request = $connector->persons()
    ->fill([
        'name' => 'Name',
        'provider' => 'Provider name',
    ])
    ->usingJsonBody()
    ->post();
```

### Using multipart body

```php
<?php

$request = $connector->persons()
    ->fill([
        'name' => 'logo',
        'contents' => 'your-file-contents-or-stream',
        'filename' => 'logo.png',
    ])
    ->usingMultipartBody()
    ->post();
```

> Note: The id's are all **OPTIONAL**.

[See all available endpoints](http://www.google.com)


## Docs

* Configuration
* Requests

## Docs

Instantiate the connector by passing the required parameters, with that you can now retrieve and send the requests.

```php
<?php

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
    
In order to use a get request you just have to append ``->get()`` to the request. The id's are all **optional**. If you want to retrieve all of the data; skip the id's, and if you want to retrieve a specific data of the request; pass the id to the request.
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

You can also check our tests to see more examples, All tests corresponds to a specific api endpoint.

``Via Request: /tests/Feature/Requests/``

``Via Connector: /tests/Feature/Connector/Requests/``
    
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

$request = (new PersonRequests($personId))->get();
$response = $nextGenConnector->send($request);
```

</details>

<details>
  <summary>Via Connector:</summary>
 
```php
use Clinect\NextGen\NextGen;

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
