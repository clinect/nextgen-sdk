<?php

namespace Clinect\NextGen\Requests\Persons;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use Clinect\NextGen\DataTransferObjects\Person;
use Saloon\Http\Faking\MockResponse;

class GetAllPersons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/persons";
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Person::fromResponse($response, 'multiple');
    }
    
    public function mockResponse($success = true): MockResponse
    {
        return $success ? MockResponse::make(array(new Person(
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
        ), $patient[] = new Person(
            2,
            null,
            'Test Last Name 2',
            'Test First Name 2',
            'Test Last Name 2, Test First Name 2',
            'Test First Name 2',
            'Test First Name 2',
            'testemail2@gmail.com',
            '1234562',
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
