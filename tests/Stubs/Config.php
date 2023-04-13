<?php

namespace Clinect\NextGen\Tests\Stubs;

use Clinect\NextGen\NextGenConfig;
use Illuminate\Support\Facades\Cache;

trait Config
{
    public string $testBaseUrl = 'test.clinect.com';

    public function config()
    {
        return NextGenConfig::create([
            'client_id' => 'Test-client-id',
            'secret' => 'Test-secret',
            'site_id' => 'Test-site_id',
            'enterprise_id' => 'Test-enterprise-id',
            'practice_id' => 'Test-practice-id',
            'base_url' => $this->testBaseUrl,
            'route_uri' => '',
            'auth_uri' => 'test-auth-uri',
            'cache_adapter' => [
                'type' => 'laravel-cache',

                'driver' => Cache::class,

                'cache_type' => 'file',

                'expiry_time' => 3600,
            ],
        ]);
    }
}
