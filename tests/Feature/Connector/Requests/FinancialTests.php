<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Financial as FinancialStub;

class FinancialTests extends TestCase
{
    use FinancialStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanGetFinancialBatches()
    {
        $request = $this->apiConnector->disableCaching()
            ->financial()->batches()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        $this->assertNotEmpty($response->json()['items']);
    }

    public function testCanGetFinancialBatch()
    {
        $request = $this->apiConnector->disableCaching()
            ->financial()->batches($this->batchId)
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json()['id'], $this->batchId);
    }

    public function testCanGetFinancialGuarantorsAccount()
    {
        $request = $this->mockConnector->disableCaching()
            ->financial()->guarantors(1)->account()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'Guarantor Name 1');
    }

    public function testCanGetFinancialTransactions()
    {
        $request = $this->mockConnector->disableCaching()
            ->financial()->transactions()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        foreach ($response->json() as $key => $data) {
            $this->assertSame($data['name'], $this->transactions()[$key]['name']);
        }
    }

    public function testCanGetFinancialTransaction()
    {
        $request = $this->mockConnector->disableCaching()
            ->financial()->transactions(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'Transaction 1');
    }
}
