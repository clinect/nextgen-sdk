<?php

namespace Clinect\NextGen\Requests\Insurances;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

class PostPatientInsuranceCard extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    // Multipart - add when calling the request
    public function __construct(
        public int|string $patientId,
        public int|string $personPayerId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/insurances/{$this->personPayerId}/cards";
    }

    protected function defaultBody(): array
    {
        return [
            'description' => $this->patientId
        ];
    }
}
