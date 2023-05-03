<?php

return [
    'client_id' => env('NEXTGEN_CLIENTID'),


    'secret' => env('NEXTGEN_SECRET'),


    'site_id' => env('NEXTGEN_SITEID'),


    'enterprise_id' => env('NEXTGEN_ENTERPRISEID'),


    'practice_id' => env('NEXTGEN_PRACTICEID'),


    'base_url' => env('NEXTGEN_URL', 'https://nativeapi.nextgen.com/nge/prod'),


    'route_uri' => env('NEXTGEN_ROUTEURI', '/nge-api/api'),


    'auth_uri' => env('NEXTGEN_AUTHURI', '/nge-oauth/token'),


    'cache_adapter' => [
        'type' => 'laravel-cache',

        'driver' => Illuminate\Support\Facades\Cache::class,

        'cache_type' => 'file',

        'expiry_time' => 1000,
    ],
];