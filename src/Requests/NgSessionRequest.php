<?php

namespace Clinect\NextGen\Requests;

use Saloon\Http\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\Authenticator;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Http\Auth\TokenAuthenticator;

class NgSessionRequest extends Request implements HasBody
{
    use HasJsonBody;

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

    protected function defaultBody(): array
    {
        return [
            'enterpriseId' => $this->enterpriseId,
            'practiceId' => $this->practiceId,
        ];
    }
}
