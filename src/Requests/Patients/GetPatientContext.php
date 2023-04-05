<?php

namespace Clinect\NextGen\Requests\Patients;

use Clinect\NextGen\DataTransferObjects\Person;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use Saloon\Http\Faking\MockResponse;

class GetPatientContext extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $practiceId,
        public int $patientId,
        public array $args
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/patients/{$this->patientId}";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Person::fromResponse($response);
    }

    public function mockResponse($success = true): MockResponse
    {
        return $success ? MockResponse::make(json_encode(new Person(
            1,
            null,
            'Test Last Name',
            'Test First Name',
            'Test Last Name, Test First Name',
            'Test First Name',
            'Test First Name',
            'testemail@gmail.com',
            '123456',
            '11/29/1996',
            'male',
            true,
            'eng',
            false,
            false,
            'contact pref'
        )), 200) : MockResponse::make(['error' => 'Server Error'], 500);
    }
}
