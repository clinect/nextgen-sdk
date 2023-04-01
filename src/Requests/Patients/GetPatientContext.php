<?php

namespace Clinect\NextGen\Requests\Persons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPatientContext extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $practiceId,
        public int $patientId,
        public array $args
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/patients/{$this->patientId}";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }
}
