# NextGen SDK
A extendable sdk powered by [Saloon](https://github.com/sammyjo20/saloon).

## Installation

To get started with NextGen SDK, you will need to install it through Composer.

```
$ composer require clinect/nextgen-sdk
```

> Note: NextGen SDK supports PHP 8.1+

### Dependencies

NextGen SDK has two dependencies.

* [Saloon](https://github.com/Sammyjo20/saloon-docs) (Core php library for API integration framework)
* [Saloon Cache Plugin](https://github.com/Sammyjo20/saloon-cache-plugin) (Official cache plugin for Saloon v2)

### Using Laravel?

After the installation. Next, publish the configuration file with the following Artisan command

```
php artisan vendor:publish --tag=nextgen-config
```

## NextGen Sdk Class

There are two ways in using NextGen SDK class.

### By Instantiating The Class

```php
<?php

use Clinect\NextGen\NextGen;

$connector = new NextGen(...);

$request = $connector->persons()->get();
```

### By Using Laravel Dependency Injection

```php
<?php

use Clinect\NextGen\NextGen;

class ExampleController extends Controller
{
    public function show(NextGen $connector)
    {
        $request = $connector->persons()->get();
    }
}
```

## Authorization/Session

The authorization and session is executed automatically when the nextgen sdk class is instantiated.

## Configuration

#### List of NextGen config keys:

* `client_id`
* `secret`
* `site_id`
* `enterprise_id`
* `practice_id`
* `base_url`
* `route_uri`
* `auth_uri`
* `cache_adapter` ([see more about caching responses below](README.md#caching-responses))

> Note: All config keys and values are required.

#### Usage

```php
<?php

use Clinect\NextGen\NextGen;
use Clinect\NextGen\NextGenConfig;

$config = NextGenConfig::create([
    'client_id' => 'nextgen-client-id',
    'secret' => 'nextgen-secret',
    'site_id' => 'nextgen-site-id',
    'enterprise_id' => 'nextgen-enterprise-id',
    'practice_id' => 'nextgen-practice-id',
    'base_url' => 'https://nativeapi.nextgen.com/nge/prod',
    'route_uri' => '/nge-api/api',
    'auth_uri' => '/nge-oauth/token',
    'cache_adapter' => [
        'type' => 'laravel-cache',

        'driver' => Illuminate\Support\Facades\Cache::class,

        'cache_type' => 'file',

        'expiry_time' => 3600,
    ],
]);

$connector = new NextGen($config);
```

#### Using Laravel?

Publish the config using the artisan command ([see above example](README.md#using-laravel)). And add this to your `.env` config file.

```env
# config for .env file

NEXTGEN_CLIENTID=nextgen-client-id
NEXTGEN_SECRET=nextgen-secret
NEXTGEN_SITEID=nextgen-site-id
NEXTGEN_ENTERPRISEID=nextgen-enterprise-id
NEXTGEN_PRACTICEID=nextgen-practice-id
NEXTGEN_URL=https://nativeapi.nextgen.com/nge/prod
NEXTGEN_ROUTEURI=/nge-api/api
NEXTGEN_AUTHURI=/nge-oauth/token
```

## Requests

NextGen SDK request stores the information of a single API request. Within a request, you can set the HTTP Method by appending at the end of each endpoint request.

#### Methods
* `get()`
* `post()`
* `put()`
* `patch()`
* `delete()`

> Note: The id's are all **OPTIONAL**.

[See all available endpoints](list-endpoints.md)

### Usage

#### GET

```php
<?php

use Clinect\NextGen\NextGen;

$connector = new NextGen(...);

// Endpoint: "/persons"
$request = $connector->persons()->get();

// Endpoint: "/persons/{id}"
$request = $connector->persons({id})->get();
```

#### POST|PUT|PATCH|DELETE

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

### Headers

```php
<?php

use Clinect\NextGen\NextGen;

$connector = new NextGen(...);

$request = $connector->persons()
    ->withHeaders([
        ...
    ])
    ->get();
```

### Query Parameters

```php
<?php

use Clinect\NextGen\NextGen;

$connector = new NextGen(...);

$request = $connector->persons()
    ->withQuery([
        ...
    ])
    ->get();
```

### Client Config

```php
<?php

use Clinect\NextGen\NextGen;

$connector = new NextGen(...);

$request = $connector->persons()
    ->withConfig([
        ...
    ])
    ->get();
```

### Pagination

```php
<?php

use Clinect\NextGen\NextGen;

$connector = new NextGen(...);

$request = $connector->persons()->paginate(perPage: $perPage, page: $page);
```

### Request Body/Data

#### Using form body

```php
<?php

use Clinect\NextGen\NextGen;

$request = $connector->persons()
    ->fill([
        'name' => 'Name',
        'provider' => 'Provider name',
    ])
    ->usingFormBody()
    ->post();
```

#### Using json body

```php
<?php

use Clinect\NextGen\NextGen;

$request = $connector->persons()
    ->fill([
        'name' => 'Name',
        'provider' => 'Provider name',
    ])
    ->usingJsonBody()
    ->post();
```

#### Using multipart body

```php
<?php

use Clinect\NextGen\NextGen;

$request = $connector->persons()
    ->fill([
        'name' => 'logo',
        'contents' => 'your-file-contents-or-stream',
        'filename' => 'logo.png',
    ])
    ->usingMultipartBody()
    ->post();
```

## Responses

Depending on how you sent your request (synchronous/asynchronous) you will either receive an instance of `Response` or a `PromiseInterface`.

### Synchronous Responses

```php
<?php

use Clinect\NextGen\NextGen;

$connector = new NextGen(...);

$request = $connector->persons()->get();

$response = $connector->send($request);

// Returns the HTTP body as a string
$response->body();

// Retrieves a JSON response body and json_decodes it into an array.
$response->json();
```

### Asynchronous Responses

```php
<?php

use Clinect\NextGen\NextGen;
use Saloon\Contracts\Response;

$connector = new NextGen(...);

$request = $connector->persons()->get();

$response = $connector->sendAsync($request);

$promise->then(function (Response $response) {
        // Handle successful response
    })
    ->otherwise(function (Exception $exception) {
        // Handle failed request
    });
```

## Caching Responses

There are scenarios where you may want to cache a response from an API, like retrieving a static list or retrieving data that you know won't change for a specified amount of time. Caching can be incredibly powerful and can speed up an application by relying less on a third-party integration. There are three types of caching integration.

> Note: Caching can be added/changed based on user taste in the `NextGenConfig::create([...])` or if using **Laravel** in `./config/clinect/nextgen.php` file.

#### PsrCacheDriver (Supports PSR-16 Cache Implementations)

`Not available.`

#### FlysystemDriver (Requires league/flysystem version 3)

`Not available.`

#### LaravelCacheDriver (Supports any of Laravel's cache disks, requires Laravel)

```php
<?php

use Clinect\NextGen\NextGenConfig;

NextGenConfig::create([
    ...
    'cache_adapter' => [
        // Cache type.
        'type' => 'laravel-cache',

        // Driver to be used.
        'driver' => Illuminate\Support\Facades\Cache::class,

        // Where to store the cache: "file", "redis", etc...
        // For reference: Check your laravel './config/cache.php'file
        'cache_type' => 'file',

        // Set cache expiry time in seconds.
        'expiry_time' => 3600,
    ],
]);
```

#### Usage

```php
<?php

$connector = new NextGen(...);

// Using cache
$request = $connector->enableCaching()->persons()->get();

// Not using cache
$request = $connector->persons()->get();
```

## License

The MIT License (MIT).
