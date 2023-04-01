<?php

namespace Clinect\NextGen\Requests\Encounters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllPatientEncounter extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $patientId
    ) { }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/chart/encounters";
    }
}
