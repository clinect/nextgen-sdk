<?php

namespace Clinect\NextGen\Requests;

use Saloon\Http\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class AuthRequest extends Request implements HasBody
{
    use HasJsonBody;
    
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string $clientId,
        public readonly string $clientSecret,
        public readonly string $siteId,
    ) {
    }
    
    public function resolveEndpoint(): string
    {
        return '/nge-oauth/token';
    }

    public function defaultBody(): array
    {
        return [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'site_id' => $this->siteId,
        ];
    }
}
