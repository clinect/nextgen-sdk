<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\Requests\HasMockResponses;
use Clinect\NextGen\DataTransferObjects\Persons\Person;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;

class GetPerson extends Request
{
    use HasMockResponses;

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
        return Person::fromResponse($response);
    }
}
