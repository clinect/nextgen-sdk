<?php

namespace Clinect\NextGen\Requests;

use Saloon\Http\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class NgSessionRequest extends Request implements HasBody
{
    use HasJsonBody;
    
    protected Method $method = Method::PUT;

    public function __construct(
        public readonly string $enterpriseId,
        public readonly string $practiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/nge-api/api/users/me/login-defaults';
    }

    public function defaultBody(): array
    {
        return [
            'enterpriseid' => $this->enterpriseId,
            'practiceId' => $this->practiceId,
        ];
    }
}
