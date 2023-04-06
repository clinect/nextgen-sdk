<?php

namespace Clinect\NextGen\Requests\Charges;

use Clinect\NextGen\Requests\HasMockResponses;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPersonCharges extends Request
{
    use HasMockResponses;

    protected Method $method = Method::GET;

    public function __construct(
        public array $args,
        public int|string $patientId,
        public int|string $chargesId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/chart/charges/{$this->chargesId}";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }
}
