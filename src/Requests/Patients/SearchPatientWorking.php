<?php

namespace Clinect\NextGen\Requests\Patients;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SearchPatientWorking extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int|string $practiceId,
        public array $args
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/patients/search";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }
}
