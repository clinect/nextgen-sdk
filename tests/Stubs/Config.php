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

    public function apiUrl(): string
    {
        return "https://nativeapi.nextgen.com/nge/prod/nge-api/api";
    }

    public function mockAuthorize(): array
    {
        return [
            "{$this->testBaseUrl}{$this->testAuthUri}" => MockResponse::make([
                'access_token' => 'example-token', 'token_type' => 'Bearer', 'time' => 1000
            ], 200),

            "{$this->url()}/users/me/login-defaults" =>  MockResponse::make([
                'id' => 'test-id', 'name' => 'Test name'
            ], 200, [
                'x-ng-sessionid' => 'example-session-id',
            ]),
        ];
    }

    public function mockConfig(): NextGenConfig
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

                'expiry_time' => 1000,
            ],
        ]);
    }

    public function apiAuthorize(): array
    {
        return [
            "https://nativeapi.nextgen.com/nge/prod/nge-oauth/token" => MockResponse::fixture('Config/authorization'),
            "{$this->apiUrl()}/users/me/login-defaults" => MockResponse::fixture('Config/ng-session'),
        ];
    }

    public function apiConfig(): NextGenConfig
    {
        return NextGenConfig::create([
            'client_id' => 'l723c8df26aec14a81b33c513dd857746b',
            'secret' => '5e084d602dff49dc9679a0cfe1a31b98',
            'site_id' => 'c8e052ba-2d8b-e70a-ef88-fcd1a3022d73',
            'enterprise_id' => '00002',
            'practice_id' => '0006',
            'base_url' => 'https://nativeapi.nextgen.com/nge/prod',
            'route_uri' => '/nge-api/api',
            'auth_uri' => '/nge-oauth/token',
            'cache_adapter' => [
                'type' => 'laravel-cache',

                'driver' => Cache::class,

                'cache_type' => 'file',

                'expiry_time' => 1000,
            ],
        ]);
    }
}
