<?php

namespace Clinect\NextGen\Requests\Balances;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPersonBalance extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int|string $patientId,
        public int|string $balanceId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/chart/balances/{$this->balanceId}";
    }
}