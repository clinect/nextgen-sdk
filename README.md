# NextGen SDK

## Installation

Use Composer to install this SDK

```
composer require clinect/nextgen-sdk
```

## Usage

Simply call the `send` method with the request class you would like to send. Once sent, a `Response` is returned.

```php
use Clinect\NextGen;
use Clinect\NextGen\Requests\Persons\GetAllPersons;

$connector = new NextGen(
    clientId: 'client-id-123',
    secret: 'secret-123',
    siteId: 'site-id-123',
    enterpriseId: 'enterprise-id-123',
    practiceId: 'practice-id-123',
);

$results = $connector->paginator(new GetAllPersons);

foreach($results as $result) {
    // Handle result
}
```

## Paginated Results
You may prefer to retrieve all the results from the paginated requests by using the `paginator` method on the connector.

```php
<?php

use Clinect\NextGen;
use Clinect\NextGen\Requests\Persons\GetAllPersons;

$pokeapi = new NextGen();

$results = $pokeapi->paginator(new GetAllPersons);

foreach($results as $result) {
    // Handle result
}
```

## Laravel usage

```php
class UserController extends Controller
{
    public function showProfile($id, NextGen $nextgen)
    {
        $user = Cache::get('user:'.$id);
        
        return view('profile', [
            'persons' => $nextgen->paginator(new GetAllPersons),
        ]);
    }
}
```
