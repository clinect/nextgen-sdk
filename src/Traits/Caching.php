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
    protected $cacheInstance;

    public function resolveCacheDriver(): Driver
    {
        switch ($this->configs->getCacheAdapter('type')) {
            case 'psr-cache':
                $this->cacheInstance = new PsrCacheDriver($this->configs->getCacheAdapter('driver'));
                break;
            case 'filesystem':
                $this->cacheInstance = new FlysystemDriver($this->configs->getCacheAdapter('driver'));
                break;
            case 'laravel-cache':
            default:
                $class = $this->configs->getCacheAdapter('driver');
                $this->cacheInstance =  new LaravelCacheDriver($class::store($this->configs->getCacheAdapter('cache_type')));
                break;
        }
        return $this->cacheInstance;
    }

    public function cacheExpiryInSeconds(): int
    {
        return $this->configs->getCacheAdapter('expiry_time');
    }

    protected function getCacheableMethods(): array
    {
        return [Method::GET, Method::POST, Method::PUT, Method::PATCH];
    }

    public function getCache($key)
    {
        return $this->cacheInstance->get($key);
    }
}
