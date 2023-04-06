<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\DataTransferObjects\Patients\PatientWorking;
use Clinect\NextGen\DataTransferObjects\Persons\Person;
use Clinect\NextGen\NextGenSdk;
use Clinect\NextGen\Requests\Patients\GetPatientContext;
use Clinect\NextGen\Requests\Patients\SearchPatientWorking;
use Saloon\Http\Faking\MockClient;
use Orchestra\Testbench\TestCase;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;

class PatientsTest extends TestCase
{
    public function testCanGetPatientContext()
    {
        $nextGenSdk = new NextGenSdk();

        $mockClient = new MockClient([
            $nextGenSdk->patient()->successfulMockResponse(),
            $nextGenSdk->patient()->failedMockResponse()
        ]);
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->patient()->getPatientContext(1, 1, []);
        $this->assertTrue($response->successful());
        $mockClient->assertSent(GetPatientContext::class);

        $response = $nextGenSdk->patient()->getPatientContext(1, 1, []);
        $this->assertTrue($response->failed());
        $mockClient->assertSent(GetPatientContext::class);
    }

    public function testCanSearchPatientWorking()
    {
        $nextGenSdk = new NextGenSdk();
        $mockClient = new MockClient([
            $nextGenSdk->patient()->successfulMockResponse(),
            $nextGenSdk->patient()->failedMockResponse()
        ]);
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->patient()->searchPatientWorking(1, []);
        $this->assertTrue($response->successful());
        $mockClient->assertSent(SearchPatientWorking::class);

        $response = $nextGenSdk->patient()->searchPatientWorking(1, []);
        $mockClient->assertSent(SearchPatientWorking::class);
        $this->assertTrue($response->failed());
    }
}
