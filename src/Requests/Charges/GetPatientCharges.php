<?php

namespace Clinect\NextGen\Requests\Charges;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPatientCharges extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public array $args,
        public int $patientId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/chart/charges";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }
}