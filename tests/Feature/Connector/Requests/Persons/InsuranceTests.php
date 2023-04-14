<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests\Persons;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class InsuranceTests extends TestCase
{
    use PersonStub;

    public function testCanSeePersonAllInsurances()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /persons/{$personId}/insurances
        $request = $connector->persons('person-id')
            ->insurances()
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->insurances()[$key]['name'], $result['name']);
            $this->assertSame($this->insurances()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeePersonInsurance()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /persons/{$personId}/insurances/{$insuranceId}
        $request = $connector->persons('person-id')
            ->insurances('id-3')
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person insurance 3');
        $this->assertSame($response->json('category'), 'person-insurance-3');
    }

    public function testPersonInsuranceNotFound()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /persons/{$personId}/insurances/{$insuranceId}
        $request = $connector->persons('person-id')
            ->insurances('id-4')
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
