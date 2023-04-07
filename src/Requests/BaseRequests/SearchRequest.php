<?php

namespace Clinect\NextGen\Requests\BaseRequests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SearchRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public string $endpoint,
        public array $queries = [],
        public array $configs = []
    ) {
    }

    public function resolveEndpoint(): string
    {
        return $this->endpoint;
    }

    protected function defaultQuery(): array
    {
        return $this->queries;
    }

    protected function defaultConfig(): array
    {
        return $this->configs;
    }
}
