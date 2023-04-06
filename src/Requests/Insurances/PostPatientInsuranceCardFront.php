<?php

namespace Clinect\NextGen\Requests\Insurances;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

class PostPatientInsuranceCardFront extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    // on call add multipart
    public function __construct(
        public int|string $patientId,
        public int|string $personPayerId,
        public int|string $insuranceCardId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/insurances/{$this->personPayerId}/cards/{$this->insuranceCardId}/front";
    }
}
