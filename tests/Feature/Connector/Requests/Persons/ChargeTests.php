<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests\Persons;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class ChargeTests extends TestCase
{
    use PersonStub;

    public function testCanSeePersonAllCharges()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /persons/{$personId}/chart/charges
        $request = $connector->persons('person-id')->chart()->charges()->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->charges()[$key]['name'], $result['name']);
            $this->assertSame($this->charges()[$key]['category'], $result['category']);
        }
    }

    // public function testCanSeePersonCharge()
    // {
    //     $connector = new NextGen($this->config(), $this->mockClient());

    //     // Endpoint: /persons/{$personId}/chart/charges/{$chargesId}
    //     $request = $connector->persons('person-id')->chart()->charges('id-3')->get();
    //     dd($request);
    //     $response = $connector->send($request);

    //     $this->assertSame($response->status(), 200);
    //     $this->assertSame($response->json('name'), 'Person charge 3');
    //     $this->assertSame($response->json('category'), 'person-charge-3');
    // }

    // public function testPersonChargeNotFound()
    // {
    //     $connector = new NextGen($this->config(), $this->mockClient());

    //     // Endpoint: /persons/{$personId}/chart/charges/{$chargesId}
    //     $request = $connector->persons('person-id')->chart()->charges('id-4')->get();

    //     $response = $connector->send($request);

    //     $this->assertSame($response->status(), 404);
    //     $this->assertSame($response->json('error'), 'No data available');
    // }
}
