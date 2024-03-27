<?php

namespace Clinect\NextGen;

use Saloon\Http\Request;
use Saloon\Http\Connector;
use Saloon\Http\Paginators\PagedPaginator;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Auth\MultiAuthenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Clinect\NextGen\Requests\RequestResources;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class NextGenConnector extends Connector
{
    use RequestResources;
    use AlwaysThrowOnErrors;

    public function resolveBaseUrl(): string
    {
        return 'https://nativeapi.nextgen.com/nge/prod';
    }

    public function paginate(Request $request, int $perPage = 20, int $page = 1): PagedPaginator
    {
        return new PagedPaginator($this, $request, $perPage, $page);
    }
}
