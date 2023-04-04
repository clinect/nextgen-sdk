<?php

namespace Clinect\NextGen;

use Saloon\Http\Connector;
use Illuminate\Support\Facades\Config;

class NextGenSdk extends Connector
{
    public function resolveBaseUrl(): string
    {
        return (string) Config::get('clinect.nextgen.base_url');
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
            'per_page' => Config::get('clinect.nextgen.per_page'),
        ];
    }
}
