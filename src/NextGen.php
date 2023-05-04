<?php

namespace Clinect\NextGen;

use Saloon\Http\Request;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Clinect\NextGen\Requests\AuthRequest;
use Saloon\Http\Paginators\PagedPaginator;
use Saloon\CachePlugin\Contracts\Cacheable;
use Clinect\NextGen\Requests\NgSessionRequest;
use Clinect\NextGen\Requests\RequestResources;
use Saloon\Contracts\PendingRequest;

class NextGen extends Connector implements Cacheable
{
    use RequestResources;
    use Traits\Caching;

    public function __construct(
        public NextGenConfig $configs,
        protected ?MockClient $mockclient = null
    ) {
        if ($mockclient) {
            $this->withMockClient($mockclient);
        }

        $this->authorize();

        $this->disableCaching();
    }

    public function boot(PendingRequest $pendingRequest): void
    {
        if (
            !strpos($pendingRequest->getUrl(), $this->configs->getAuthUri()) &&
            !strpos($pendingRequest->getUrl(), NgSessionRequest::getEndpoint())
        ) {
            $this->authorize();
        }
    }

    public function resolveBaseUrl(): string
    {
        return "{$this->configs->getBaseUrl()}{$this->configs->getRouteUri()}";
    }

    protected function authorize(): void
    {
        if ($this->hasMockClient()) {
            $this->disableCaching();
        } else {
            $this->enableCaching();
        }

        $request = (new AuthRequest("{$this->configs->getBaseUrl()}{$this->configs->getAuthUri()}"))
            ->fill([
                'grant_type' => 'client_credentials',
                'client_id' => $this->configs->getClientId(),
                'client_secret' => $this->configs->getSecret(),
                'site_id' => $this->configs->getSiteId(),
            ])
            ->post();

        $response = $this->send($request);

        if ($response->failed()) {
            $response->throw();
        }
        $this->configs->setCacheExpiryTime((string)$response->json('expires_in'));

        $this->withTokenAuth((string) $response->json('access_token'), (string) $response->json('token_type'));

        $request = (new NgSessionRequest)
            ->withConfig([
                'json' => [
                    'enterpriseid' => $this->configs->getEnterpriseId(),
                    'practiceId' => $this->configs->getPracticeId(),
                ],
            ])
            ->put();

        $response = $this->send($request);

        if ($response->failed()) {
            $response->throw();
        }

        $this->headers()->add('X-NG-SessionID', $response->headers()->get('x-ng-sessionid'));
    }


    public function paginate(Request $request, int $perPage = 20, int $page = 1): PagedPaginator
    {
        return new PagedPaginator($this, $request, $perPage, $page);
    }
}
