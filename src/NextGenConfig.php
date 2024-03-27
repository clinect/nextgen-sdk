<?php

namespace Clinect\NextGen;

use Clinect\NextGen\Contracts\Configuration;

class NextGenConfig implements Configuration
{
    public function __construct(
        public string $clientId,
        public string $secret,
        public string $siteId,
        public string $enterpriseId,
        public string $practiceId,
        public string $baseUrl,
        public string $routeUri,
        public string $authUri,
        public string $cacheAdapter,
    ) {
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getSecret(): string
    {
        return $this->secret;
    }

    public function getSiteId(): string
    {
        return $this->siteId;
    }

    public function getEnterpriseId(): string
    {
        return $this->enterpriseId;
    }

    public function getPracticeId(): string
    {
        return $this->practiceId;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getRouteUri(): string
    {
        return $this->routeUri;
    }

    public function getAuthUri(): string
    {
        return $this->authUri;
    }

    public function getCacheAdapter(string $key): mixed
    {
        return $this->cacheAdapter[$key];
    }

    public function setCacheExpiryTime(string $time): void
    {
        $this->cacheAdapter['expiry_time'] = $time;
    }
}
