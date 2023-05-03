<?php

namespace Clinect\NextGen\Contracts;

interface Configuration
{
    /**
     * Create configuration.
     * 
     * @param array $config
     * @return static
     */
    public static function create(array $config): static;

    /**
     * Get the config keys.
     * 
     * @return array
     */
    public function configKeys(): array;

    /**
     * Get client id.
     * 
     * @return string
     */
    public function getClientId(): string;

    /**
     * Get secret.
     * 
     * @return string
     */
    public function getSecret(): string;

    /**
     * Get site id.
     * 
     * @return string
     */
    public function getSiteId(): string;

    /**
     * Get enterprise id.
     * 
     * @return string
     */
    public function getEnterpriseId(): string;

    /**
     * Get practice id.
     * 
     * @return string
     */
    public function getPracticeId(): string;

    /**
     * Get base url.
     * 
     * @return string
     */
    public function getBaseUrl(): string;

    /**
     * Get route uri.
     * 
     * @return string
     */
    public function getRouteUri(): string;

    /**
     * Get auth uri.
     * 
     * @return string
     */
    public function getAuthUri(): string;

    /**
     * Get cache adapter.
     * 
     * @param string $key
     * @return array
     */
    public function getCacheAdapter(string $key): mixed;

    /**
     * set cache expiry time.
     * 
     * @param string $key
     * @return void
     */
    public function setCacheExpiryTime(string $key): void;
}
