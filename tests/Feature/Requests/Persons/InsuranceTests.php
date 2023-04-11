<?php

namespace Clinect\NextGen\Tests\Feature\Requests\Persons;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Requests\PersonsRequest;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class InsuranceTests extends TestCase
{
    use PersonStub;

    public function testCanSeePersonAllInsurances()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/insurances
        $request = (new PersonsRequest('person-id'))
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
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/insurances/{$insuranceId}
        $request = (new PersonsRequest('person-id'))
            ->insurances('id-3')
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person insurance 3');
        $this->assertSame($response->json('category'), 'person-insurance-3');
    }

    public function testPersonInsuranceNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/insurances/{$insuranceId}
        $request = (new PersonsRequest('person-id'))
            ->insurances('id-4')
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
