<?php

namespace Clinect\NextGen\Requests\Insurances;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

class PostPatientInsuranceCardBack extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function __construct(
        public int $patientId,
        public int $personPayerId,
        public int $insuranceCardId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/insurances/{$this->personPayerId}/cards/{$this->insuranceCardId}/back";
    }
}
