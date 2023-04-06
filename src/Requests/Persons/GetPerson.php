<?php

namespace Clinect\NextGen\Requests\Persons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPerson extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int|string $patientId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}";
    }
}
