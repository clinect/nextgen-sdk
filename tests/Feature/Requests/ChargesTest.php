<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\Charges\GetPersonAllCharges;
use Clinect\NextGen\Requests\Charges\GetPersonCharge;
use Saloon\Http\Faking\MockClient;
use Orchestra\Testbench\TestCase;

class ChargesTest extends TestCase
{
    public function testCanGetAllPersonCharges()
    {
        $nextGen = new NextGen();

        $mockClient = new MockClient([
            $nextGen->persons()->charges()->successfulMockResponse(),
            $nextGen->persons()->charges()->failedMockResponse()
        ]);

        $nextGen->withMockClient($mockClient);

        $response = $nextGen->persons(1)->charges()->all([]);
        $mockClient->assertSent(GetPersonAllCharges::class);
        $this->assertTrue($response->successful());

        $response = $nextGen->persons(1)->charges()->all([]);
        $mockClient->assertSent(GetPersonAllCharges::class);
        $this->assertTrue($response->failed());
    }

    public function testCanGetPersonCharge()
    {
        $nextGen = new NextGen();

        $mockClient = new MockClient([
            $nextGen->persons()->charges()->successfulMockResponse(),
            $nextGen->persons()->charges()->failedMockResponse()
        ]);

        $nextGen->withMockClient($mockClient);

        $response = $nextGen->persons(1)->charges()->find([],2);
        $mockClient->assertSent(GetPersonCharge::class);
        $this->assertTrue($response->successful());

        $response = $nextGen->persons(1)->charges()->find([],2);
        $mockClient->assertSent(GetPersonCharge::class);
        $this->assertTrue($response->failed());
    }
}
