<?php

namespace Clinect\NextGenSdk;

use Saloon\Http\Connector;

class NextGenSdk extends Connector
{
    public function resolveBaseUrl(): string
    {
        return (string) config('clinect.nextgen.base_url');
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
            'per_page' => config('clinect.nextgen.per_page'),
        ];
    }
}
