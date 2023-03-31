<?php

namespace Clinect\NextGen;

use Saloon\Http\Connector;
use Saloon\Contracts\Request;

class NextGenSdk extends Connector
{
    public array $headers = [];

    public function __construct(
        public string $baseUrl = '',
        public string $token = '',
    ) {   
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function defaultHeaders(): array
    {
        if ($this->headers) {
            return $this->headers;
        }

        return [
            'Content-type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
        ];
    }
}
