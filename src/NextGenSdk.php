<?php

namespace Clinect\NextGen;

use Saloon\Http\Connector;

class NextGenSdk extends Connector
{
    public function __construct(
        public string $baseUrl,
        public string $token,
    ) {
        $this->withTokenAuth($this->token);
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    protected function defaultQuery(): array
    {
        return [
            'per_page' => 20,
        ];
    }
}
