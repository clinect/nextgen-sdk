<?php

namespace Clinect\NextGen\Tests\Feature\Requests\Persons;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Requests\PersonsRequest;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class InsuranceCardTests extends TestCase
{
    use PersonStub;

    public function testCanSeePersonAllInsuranceCards()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/insurances/{$insuranceId}/cards
        $request = (new PersonsRequest('person-id'))
            ->insurances('insurance-id')
            ->cards()
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->insuranceCards()[$key]['name'], $result['name']);
            $this->assertSame($this->insuranceCards()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeePersonInsuranceCard()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/insurances/{$insuranceId}/cards/{$cardId}
        $request = (new PersonsRequest('person-id'))
            ->insurances('insurance-id')
            ->cards('id-3')
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person insurance card 3');
        $this->assertSame($response->json('category'), 'person-insurance-card-3');
    }

    public function testCanSeePersonInsuranceCardBack()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/insurances/{$insuranceId}/cards/{$cardId}/back
        $request = (new PersonsRequest('person-id'))
            ->insurances('insurance-id')
            ->cards('card-id')
            ->back()
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person insurance card back 3');
        $this->assertSame($response->json('category'), 'person-insurance-card-back-3');
    }

    public function testCanSeePersonInsuranceCardFront()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/insurances/{$insuranceId}/cards/{$cardId}/front
        $request = (new PersonsRequest('person-id'))
            ->insurances('insurance-id')
            ->cards('card-id')
            ->front()
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person insurance card front 3');
        $this->assertSame($response->json('category'), 'person-insurance-card-front-3');
    }

    public function testPersonInsuranceCardNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/insurances/{$insuranceId}/cards/{$cardId}
        $request = (new PersonsRequest('person-id'))
            ->insurances('insurance-id')
            ->cards('id-4')
            ->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
