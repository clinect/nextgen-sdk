<?php

namespace Clinect\NextGen;

use Saloon\Http\Request;
use Saloon\Http\Connector;
use Saloon\Http\Paginators\PagedPaginator;
use Clinect\NextGen\Requests\RequestResources;

class NextGen extends Connector
{
    use RequestResources;

    public int $perPage = 20;

    public function __construct(
        public string $clientId = '',
        public string $secret = '',
        public string $siteId = '',
        public string $enterpriseId = '',
        public string $practiceId = '',
        public string $baseUrl = '',
        public string $routeUri = ''
    ) { }
    
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
            'per_page' => $this->perPage,
        ];
    }

    public function paginate(Request $request, int $perPage = 20): PagedPaginator
    {
        return new PagedPaginator($this, $request, $perPage);
    }
}
