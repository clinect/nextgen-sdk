<?php

namespace Clinect\NextGen\Tests\Feature\Requests\Persons;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Requests\PersonsRequest;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class BalanceTests extends TestCase
{
    use PersonStub;

    public function testCanSeePersonAllBalances()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/chart/balances
        $request = (new PersonsRequest('person-id'))->chart()->balances()->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->balances()[$key]['name'], $result['name']);
            $this->assertSame($this->balances()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeePersonBalance()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/chart/balances/{$balanceId}
        $request = (new PersonsRequest('person-id'))->chart()->balances('id-3')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person balance 3');
        $this->assertSame($response->json('category'), 'person-balance-3');
    }

    public function testPersonBalanceNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/chart/balances/{$balanceId}
        $request = (new PersonsRequest('person-id'))->chart()->balances('id-4')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
