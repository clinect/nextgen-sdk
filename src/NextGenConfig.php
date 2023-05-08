<?php

namespace Clinect\NextGen;

use Clinect\NextGen\Contracts\Configuration;

class NextGenConfig implements Configuration
{
    protected array $configs;

    public static function create(array $config): static
    {
        $static = new static();

        foreach ($static->configKeys() as $key) {
            if (!array_key_exists($key, $config)) {
                throw new \Exception("Config key '{$key}' is missing.");
            }
        }

        $static->configs = $config;

        return $static;
    }

    public function configKeys(): array
    {
        return ['client_id', 'secret', 'site_id', 'enterprise_id', 'practice_id', 'base_url', 'route_uri', 'auth_uri', 'cache_adapter'];
    }

    public function getClientId(): string
    {
        return $this->configs['client_id'];
    }

    public function getSecret(): string
    {
        return $this->configs['secret'];
    }

    public function getSiteId(): string
    {
        return $this->configs['site_id'];
    }

    public function getEnterpriseId(): string
    {
        return $this->configs['enterprise_id'];
    }

    public function getPracticeId(): string
    {
        return $this->configs['practice_id'];
    }

    public function getBaseUrl(): string
    {
        return $this->configs['base_url'];
    }

    public function getRouteUri(): string
    {
        return $this->configs['route_uri'];
    }

    public function getAuthUri(): string
    {
        return $this->configs['auth_uri'];
    }

    public function getCacheAdapter(string $key): mixed
    {
        return $this->configs['cache_adapter'][$key];
    }

    public function setCacheExpiryTime(string $key): void
    {
        $this->configs['cache_adapter']['expiry_time'] = $key;
    }
}
