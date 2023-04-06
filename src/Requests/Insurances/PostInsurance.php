<?php

namespace Clinect\NextGen\Requests\Insurances;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class PostInsurance extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    // Multipart - add when calling the request
    public function __construct(
        public int|string $patientId,
        public array $insurance,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/insurances";
    }

    protected function defaultBody(): array
    {
        return $this->insurance;
    }
}
