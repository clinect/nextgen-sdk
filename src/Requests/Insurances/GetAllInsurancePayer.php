<?php

namespace Clinect\NextGenSdk\Requests\Insurances;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllInsurancePayer extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public array $args
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/master/payers";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }
}
