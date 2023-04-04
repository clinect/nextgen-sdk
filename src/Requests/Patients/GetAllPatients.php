<?php

namespace Clinect\NextGen\Requests\Patients;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use Clinect\NextGen\DataTransferObjects\Patient;

class GetAllPatients extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/persons";
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Patient::fromResponse($response, 'multiple');
    }
}
