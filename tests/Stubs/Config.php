<?php

namespace Clinect\NextGen\Tests\Stubs;

use Clinect\NextGen\NextGenConfig;
use Saloon\Http\Faking\MockResponse;
use Illuminate\Support\Facades\Cache;

trait Config
{
    public string $testBaseUrl = 'http://test.clinect.com';

    public string $testRouteUri = '/test-route-uri';

    public string $testAuthUri = '/test-auth-uri';

    public function url(): string
    {
        return "{$this->testBaseUrl}{$this->testRouteUri}";
    }

    public function mockAuthorize(): array
    {
        return [
            "{$this->testBaseUrl}{$this->testAuthUri}" => MockResponse::make([
                'access_token' => 'example-token', 'token_type' => 'Bearer', 'time' => 3600
            ], 200),

            "{$this->url()}/users/me/login-defaults" =>  MockResponse::make([
                'id' => 'test-id', 'name' => 'Test name'
            ], 200, [
                'x-ng-sessionid' => 'example-session-id',
            ]),
        ];
    }

    public function config(): NextGenConfig
    {
        return NextGenConfig::create([
            'client_id' => 'Test-client-id',
            'secret' => 'Test-secret',
            'site_id' => 'Test-site_id',
            'enterprise_id' => 'Test-enterprise-id',
            'practice_id' => 'Test-practice-id',
            'base_url' => $this->testBaseUrl,
            'route_uri' => $this->testRouteUri,
            'auth_uri' => $this->testAuthUri,
            'cache_adapter' => [
                'type' => 'laravel-cache',

                'driver' => Cache::class,

                'cache_type' => 'file',

                'expiry_time' => 3600,
            ],
        ]);
    }
}
