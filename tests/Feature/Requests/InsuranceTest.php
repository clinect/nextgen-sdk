<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\InsurancesRequest;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Tests\Stubs\Insurance as InsuranceStub;

class InsuranceTests extends TestCase
{
    use InsuranceStub;

    public function testCanSeeAllInsurances()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /insurances
        $request = (new InsurancesRequest)->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->all()[$key]['name'], $result['name']);
            $this->assertSame($this->all()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeInsurance()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /insurances/{$insuranceId}
        $request = (new InsurancesRequest('id-2'))->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Insurance 2');
        $this->assertSame($response->json('category'), 'insurance-2');
    }

    public function testCanSeeInsuranceDetails()
    {

        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /insurances/{$insuranceId}/{$href}
        $request = (new InsurancesRequest('id-3'))->details('href_insurance')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Insurance 3');
        $this->assertSame($response->json('category'), 'insurance-3');
    }

    public function testInsuranceNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /insurances/{$insuranceId}
        $request = (new InsurancesRequest('insurance-id'))->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
