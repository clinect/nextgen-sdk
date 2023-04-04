<?php

namespace Clinect\NextGenSdk\Requests\Patients;

use Clinect\NextGenSdk\DataTransferObjects\Patient;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;

class GetPatient extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $patientId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}";
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Patient::fromResponse($response);
    }
}
