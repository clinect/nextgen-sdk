<?php

namespace Clinect\NextGen\Requests\Patients;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllPatients extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $patientId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons";
    }
}
