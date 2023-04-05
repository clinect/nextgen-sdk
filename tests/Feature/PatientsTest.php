<?php

namespace Clinect\NextGen\Tests\Feature;

use Clinect\NextGen\DataTransferObjects\Person;
use Clinect\NextGen\NextGenSdk;
use Clinect\NextGen\Requests\Patients\GetPatientContext;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Orchestra\Testbench\TestCase;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;

class PatientsTest extends TestCase
{
    public function testCanGetPatientContext()
    {
        $successfulRequest = new GetPatientContext(1, 1, []);
        $failedRequest = new GetPatientContext(1, 1, []);

        $mockClient = new MockClient([
            $patient = $successfulRequest->mockResponse(),
            $failedRequest->mockResponse(false)
        ]);


        $nextGenSdk = new NextGenSdk('url', 'token');
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->send($successfulRequest);

        $mockClient->assertSent(function (Request $request, Response $response) use ($patient) {
            $this->assertEquals(json_decode($patient->getBody()->all(), true), (array) $response->dto());
            return $request instanceof GetPatientContext;
        });

        $response = $nextGenSdk->send($failedRequest);
        $mockClient->assertSent(GetPatientContext::class);
        $this->assertTrue($response->failed());
    }
}
