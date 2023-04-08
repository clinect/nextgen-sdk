<?php

namespace Clinect\NextGen\Tests\Feature\Requests\Persons;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Requests\PersonRequests;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class InsuranceTests extends TestCase
{
    use PersonStub;

    public function testCanSeeAllInsurances()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        $request = (new PersonRequests('person-id'))
            ->insurances()
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->insurances()[$key]['name'], $result['name']);
            $this->assertSame($this->insurances()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeInsurance()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        $request = (new PersonRequests('person-id'))
            ->insurances('id-3')
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person insurance 3');
        $this->assertSame($response->json('category'), 'person-insurance-3');
    }

    public function testInsuranceNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        $request = (new PersonRequests('person-id'))
            ->insurances('id-4')
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
