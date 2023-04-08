# NextGen SDK

## Installation

Use Composer to install this SDK

```
composer require clinect/nextgen-sdk
```

## Usage

Simply call the `send` method with the request class you would like to send. Once sent, a `Response` is returned.

```php
use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\PersonRequests;

$connector = new NextGen(
    clientId: 'client-id-123',
    secret: 'secret-123',
    siteId: 'site-id-123',
    enterpriseId: 'enterprise-id-123',
    practiceId: 'practice-id-123',
);

$request = (new PersonRequests)->get();

$results = $connector->send($request);

foreach($results as $result) {
    // Handle result
}
```

## Paginated Results
You may prefer to retrieve all the results from the paginated requests by using the `paginate` method on the connector.

```php
<?php

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\PersonRequests;

$connector = new NextGen();

$request = (new PersonRequests)->get();

$results = $connector->paginate($request);

foreach($results as $result) {
    // Handle result
}
```

## Laravel usage

```php
<?php

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\PersonRequests;

class UserController extends Controller
{
    public function show($id, NextGen $connector)
    {
        $request = (new PersonRequests)->get();

        return view('profile', [
            'persons' => $connector->paginate($request),
        ]);
    }
}
```
