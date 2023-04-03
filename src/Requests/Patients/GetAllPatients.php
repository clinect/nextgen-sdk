<?php

namespace Clinect\NextGen\Requests\Patients;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use Clinect\NextGen\DataTransferObject\Patient\Patient;

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

    public function createDtoFromResponse(Response $response): mixed
    {
        return Patient::fromResponse($response, 'multiple');
    }
}
