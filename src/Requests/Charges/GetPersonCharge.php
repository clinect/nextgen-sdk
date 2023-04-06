<?php

namespace Clinect\NextGen\Requests\Charges;

use Clinect\NextGen\Requests\HasMockResponses;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPersonCharge extends Request
{
    use HasMockResponses;

    protected Method $method = Method::GET;

    public function __construct(
        public array $args,
        public int|string $patientId,
        public int|string $chargeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        // $nextgen->person($patientId)->charges()->find($chargeId)
        return "/persons/{$this->patientId}/chart/charges/{$this->chargeId}";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }
}
