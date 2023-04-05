<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\DataTransferObjects\PersonSearch;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use Saloon\Http\Faking\MockResponse;

class SearchPerson extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public array $args
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/lookup";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return PersonSearch::fromResponse($response);
    }

    public function mockResponse($success = true): MockResponse
    {
        return $success ? MockResponse::make(array(
            new PersonSearch(
                1,
                12345,
                'Test First Name',
                'Test Last Name',
                '11/29/1996',
            )), 200) : MockResponse::make(['error' => 'Server Error'], 500);
    }
}
