<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGenSdk;
use Clinect\NextGen\Requests\Charges\GetPatientCharges;
use Saloon\Http\Faking\MockClient;
use Orchestra\Testbench\TestCase;
use Saloon\Contracts\Request;

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

        $nextGenSdk = new NextGenSdk();
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->send($successfulRequest);

        $mockClient->assertSent(function (Request $request) {
            return $request instanceof GetPatientCharges;
        });

        $response = $nextGenSdk->send($failedRequest);
        $mockClient->assertSent(GetPatientCharges::class);
        $this->assertTrue($response->failed());
    }
}
