<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\InsuranceRequests;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Insurance as InsuranceStub;

class InsuranceTests extends TestCase
{
    use InsuranceStub;

    public function testCanSeeAllInsurances()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /insurances
        $request = (new InsuranceRequests)->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->all()[$key]['name'], $result['name']);
            $this->assertSame($this->all()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeInsurance()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /insurances/{$insuranceId}
        $request = (new InsuranceRequests('id-2'))->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Insurance 2');
        $this->assertSame($response->json('category'), 'insurance-2');
    }

    public function testCanSeeInsuranceDetails()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /insurances/{$insuranceId}/{$href}
        $request = (new InsuranceRequests('id-3'))->details('href_insurance')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Insurance 3');
        $this->assertSame($response->json('category'), 'insurance-3');
    }

    public function testInsuranceNotFound()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /insurances/{$insuranceId}
        $request = (new InsuranceRequests('insurance-id'))->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
