<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\Charges\GetPatientCharges;
use Saloon\Http\Faking\MockClient;
use Orchestra\Testbench\TestCase;

class ChargesTest extends TestCase
{
    public function testCanGetPatientCharges()
    {
        $successfulRequest = new GetPatientCharges([],1);
        $failedRequest = new GetPatientCharges([],1);

        $mockClient = new MockClient([
            $successfulRequest->successfulMockResponse(),
            $failedRequest->failedMockResponse()
        ]);

        $nextGenSdk = new NextGen();
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->send($successfulRequest);
        $mockClient->assertSent(GetPatientCharges::class);

        $response = $nextGenSdk->send($failedRequest);
        $mockClient->assertSent(GetPatientCharges::class);
        $this->assertTrue($response->failed());
    }
}
