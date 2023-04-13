<?php

namespace Clinect\NextGen\Traits;

use Saloon\Enums\Method;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\CachePlugin\Drivers\PsrCacheDriver;
use Saloon\CachePlugin\Drivers\FlysystemDriver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;

trait Caching
{
    use HasCaching;

    public function resolveCacheDriver(): Driver
    {
        return match ($this->configs->getCacheAdapter('type')) {
            'psr-cache' => new PsrCacheDriver($this->configs->getCacheAdapter('driver')),
            'filesystem' => new FlysystemDriver($this->configs->getCacheAdapter('driver')),
            'laravel-cache' => new LaravelCacheDriver($this->configs->getCacheAdapter('driver')),
            default => new LaravelCacheDriver($this->configs->getCacheAdapter('driver'))
        };
    }

    public function cacheExpiryInSeconds(): int
    {
        return $this->configs->getCacheAdapter('expiry_time');
    }

    protected function getCacheableMethods(): array
    {
        return [Method::GET, Method::POST, Method::PUT, Method::PATCH];
    }
}
