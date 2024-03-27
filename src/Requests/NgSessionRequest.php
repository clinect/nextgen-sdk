<?php

namespace Clinect\NextGen\Requests;

use Saloon\Http\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;

class NgSessionRequest extends Request
{
    protected Method $method = Method::PUT;

    public function __construct(
        public readonly string $token,
        public readonly string $enterpriseId,
        public readonly string $practiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/nge-api/api/users/me/login-defaults';
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new TokenAuthenticator($this->token);
    }

    protected function defaultConfig(): array
    {
        return [
            'json' => [
                'enterpriseId' => $this->enterpriseId,
                'practiceId' => $this->practiceId,
            ],
        ];
    }
}
