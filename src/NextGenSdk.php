<?php

namespace Clinect\NextGen;

use Saloon\Http\Connector;

class NextGenSdk extends Connector
{
    public function __construct(
        public string $baseUrl = '',
        public string $token = '',
    ) {   
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
        ];
    }

    protected function defaultQuery(): array
    {
        return [
            'per_page' => 25,
        ];
    }
}
