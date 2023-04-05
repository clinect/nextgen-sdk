<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\Requests\HasMockResponses;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use Clinect\NextGen\DataTransferObjects\Person;

class GetAllPersons extends Request
{
    use HasMockResponses;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/persons";
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Person::fromResponse($response, 'multiple');
    }
}
