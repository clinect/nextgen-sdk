<?php

namespace Clinect\NextGen\Requests\Charges;

use Clinect\NextGen\Requests\HasMockResponses;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllPersonCharges extends Request
{
    use HasMockResponses;

    protected Method $method = Method::GET;

    public function __construct(
        public array $args,
        public int|string $patientId
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
