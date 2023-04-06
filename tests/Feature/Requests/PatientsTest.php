<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\Patients\GetPatientContext;
use Clinect\NextGen\Requests\Patients\SearchPatientWorking;
use Saloon\Http\Faking\MockClient;
use Orchestra\Testbench\TestCase;

class PatientsTest extends TestCase
{
    public function testCanGetPatientContext()
    {
        $nextGen = new NextGen();

        $mockClient = new MockClient([
            $nextGen->patient()->successfulMockResponse(),
            $nextGen->patient()->failedMockResponse()
        ]);
        $nextGen->withMockClient($mockClient);

        $response = $nextGen->patient()->getPatientContext(1, 1, []);
        $this->assertTrue($response->successful());
        $mockClient->assertSent(GetPatientContext::class);

        $response = $nextGen->patient()->getPatientContext(1, 1, []);
        $this->assertTrue($response->failed());
        $mockClient->assertSent(GetPatientContext::class);
    }

    public function testCanSearchPatientWorking()
    {
        $nextGen = new NextGen();
        $mockClient = new MockClient([
            $nextGen->patient()->successfulMockResponse(),
            $nextGen->patient()->failedMockResponse()
        ]);
        $nextGen->withMockClient($mockClient);

        $response = $nextGen->patient()->searchPatientWorking(1, []);
        $this->assertTrue($response->successful());
        $mockClient->assertSent(SearchPatientWorking::class);

        $response = $nextGen->patient()->searchPatientWorking(1, []);
        $mockClient->assertSent(SearchPatientWorking::class);
        $this->assertTrue($response->failed());
    }
}
