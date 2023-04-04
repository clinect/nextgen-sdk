<?php

namespace Clinect\NextGenSdk\Requests\Balances;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPatientBalance extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $patientId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/chart/balances";
    }
}
