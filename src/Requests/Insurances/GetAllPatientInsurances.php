<?php

namespace Clinect\NextGen\Requests\Insurances;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllPatientInsurances extends Request
{
    protected Method $method = Method::GET;

    // on responses, create one with insuranceSet - listPatientInsurances1() and raw - listPatientInsurances2()
    public function __construct(
        public int $patientId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/insurances";
    }
}
