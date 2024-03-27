<?php

return [
    'client_id' => env('NEXTGEN_CLIENTID'),
    'secret' => env('NEXTGEN_SECRET'),
    'site_id' => env('NEXTGEN_SITEID'),
    'default_enterprise_id' => env('NEXTGEN_DEFAULT_ENTERPRISEID'),
    'default_practice_id' => env('NEXTGEN_DEFAULT_PRACTICEID'),
    'cache_adapter' => [
        'type' => 'laravel-cache',
        'driver' => Illuminate\Support\Facades\Cache::class,
        'cache_type' => 'file',
        'expiry_time' => 1000,
    ],
];
