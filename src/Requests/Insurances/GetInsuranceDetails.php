<?php

namespace Clinect\NextGen\Requests\Insurances;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetInsuranceDetails extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public string $route,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return $this->route;
    }
}
