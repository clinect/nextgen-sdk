<?php

namespace Clinect\NextGen\Requests\Insurances;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPatientInsuranceCardFront extends Request
{
    protected Method $method = Method::GET;

    // two methods in forms-engine listPatientInsuranceCards and getPatientInsuranceCards - no difference
    public function __construct(
        public int|string $patientId,
        public int|string $personPayerId,
        public int|string $insuranceCardId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/insurances/{$this->personPayerId}/cards/{$this->insuranceCardId}/front";
    }
}
