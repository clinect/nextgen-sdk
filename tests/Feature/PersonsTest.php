<?php

namespace Clinect\NextGen\Tests\Feature;

use Clinect\NextGen\DataTransferObjects\Person;
use Clinect\NextGen\DataTransferObjects\PersonSearch;
use Clinect\NextGen\NextGenSdk;
use Clinect\NextGen\Requests\Patients\GetPatientContext;
use Clinect\NextGen\Requests\Persons\GetAllPersons;
use Clinect\NextGen\Requests\Persons\GetPerson;
use Clinect\NextGen\Requests\Persons\SearchPerson;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Orchestra\Testbench\TestCase;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;

class PersonsTest extends TestCase
{
    public function testCanGetAllPersons()
    {
        $successfulRequest = new GetAllPersons();
        $failedRequest = new GetAllPersons();

        $mockClient = new MockClient([
            $patient = $successfulRequest->successfulMockDTOResponse(Person::class, 2),
            $failedRequest->failedMockResponse()
        ]);

        $nextGenSdk = new NextGenSdk();
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->send($successfulRequest);

        $mockClient->assertSent(function (Request $request, Response $response) use ($patient) {
            foreach ($response->dto() as $key => $data) {
                $this->assertEquals($patient->getBody()->all()[$key], $data);
            }
            return $request instanceof GetAllPersons;
        });

        $response = $nextGenSdk->send($failedRequest);
        $mockClient->assertSent(GetAllPersons::class);
        $this->assertTrue($response->failed());
    }

    public function testCanGetPatient()
    {
        $successfulRequest = new GetPerson(1);
        $failedRequest = new GetPerson(1);

        $mockClient = new MockClient([
            $patient = $successfulRequest->successfulMockDTOResponse(Person::class),
            $failedRequest->failedMockResponse()
        ]);

        $nextGenSdk = new NextGenSdk();
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->send($successfulRequest);

        $mockClient->assertSent(function (Request $request, Response $response) use ($patient) {
            $this->assertEquals(json_decode($patient->getBody()->all(), true), (array) $response->dto());
            return $request instanceof GetPerson;
        });

        $response = $nextGenSdk->send($failedRequest);
        $mockClient->assertSent(GetPerson::class);
        $this->assertTrue($response->failed());
    }

    public function testCanSearchPerson()
    {
        $successfulRequest = new SearchPerson([]);
        $failedRequest = new SearchPerson([]);

        $mockClient = new MockClient([
            $patient = $successfulRequest->successfulMockDTOResponse(PersonSearch::class, 2),
            $failedRequest->failedMockResponse()
        ]);

        $nextGenSdk = new NextGenSdk();
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->send($successfulRequest);

        $mockClient->assertSent(function (Request $request, Response $response) use ($patient) {
            foreach ($response->dto() as $key => $data) {
                $this->assertEquals($patient->getBody()->all()[$key], $data);
            }
            return $request instanceof SearchPerson;
        });

        $response =  $nextGenSdk->send($failedRequest);
        $mockClient->assertSent(SearchPerson::class);
        $this->assertTrue($response->failed());
    }
}
