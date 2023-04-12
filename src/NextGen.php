<?php

namespace Clinect\NextGen;

use Saloon\Http\Request;
use Saloon\Http\Connector;
use Clinect\NextGen\Requests\AuthRequest;
use Saloon\Http\Paginators\PagedPaginator;
use Clinect\NextGen\Requests\NgSessionRequest;
use Clinect\NextGen\Requests\RequestResources;

class NextGen extends Connector
{
    use RequestResources;

    public function __construct(
        public string $clientId = '',
        public string $secret = '',
        public string $siteId = '',
        public string $enterpriseId = '',
        public string $practiceId = '',
        public string $baseUrl = 'https://nativeapi.nextgen.com/nge/prod',
        public string $routeUri = '/nge-api/api',
    ) {
        $this->authorize();
    }

    public function resolveBaseUrl(): string
    {
        return "{$this->baseUrl}{$this->routeUri}";
    }

    protected function defaultHeaders(): array
    {
        return [];
    }

    protected function authorize(): void
    {
        $routeUri = $this->routeUri;

        $this->routeUri = '';

        $request = (new AuthRequest)
            ->fill([
                'grant_type' => 'client_credentials',
                'client_id' => $this->clientId,
                'client_secret' => $this->secret,
                'site_id' => $this->siteId,
            ])
            ->post();

        $response = $this->send($request);

        $this->routeUri = $routeUri;

        if ($response->failed()) {
            $response->throw();
        }

        $this->withTokenAuth((string) $response->json('access_token'), (string) $response->json('token_type'));

        $request = (new NgSessionRequest)
            ->withConfig([
                'json' => [
                    'enterpriseid' => $this->enterpriseId,
                    'practiceId' => $this->practiceId,
                ],
            ])
            ->put();

        $response = $this->send($request);

        if ($response->failed()) {
            $response->throw();
        }

        $this->headers()->add('X-NG-SessionID', $response->headers()->get('x-ng-sessionid'));
    }

    public function paginate(Request $request, int $perPage = 20): PagedPaginator
    {
        return new PagedPaginator($this, $request, $perPage);
    }
}
