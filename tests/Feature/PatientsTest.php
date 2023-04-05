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
        $mockClient = new MockClient([
            MockResponse::make(json_encode($patient = new Person(
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
            )), 200),
            MockResponse::make(['error' => 'Server Error'], 500)
        ]);

        $nextGenSdk = new NextGenSdk('url', 'token');
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->send(new GetPatientContext(1, 1, []));

        $mockClient->assertSent(function (Request $request, Response $response) use ($patient) {
            $this->assertEquals($patient, $response->dto());
            return $request instanceof GetPatientContext;
        });

        $response = $nextGenSdk->send(new GetPatientContext(1, 1, []));
        $mockClient->assertSent(GetPatientContext::class);
        $this->assertTrue($response->failed());
    }
}
