<?php

namespace Clinect\NextGen\Requests\Patients;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SearchPatient extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public array $args
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/lookup";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }
}
