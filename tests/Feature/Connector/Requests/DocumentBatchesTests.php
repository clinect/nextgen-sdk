<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\DocumentBatches as DocumentBatchesStub;

class DocumentBatchesTests extends TestCase
{
    use DocumentBatchesStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanGetDocumentBatches()
    {
        $request = $this->apiConnector->disableCaching()
            ->documentsBatches()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        $this->assertNotEmpty($response->json()['items']);
    }

    public function testCanGetDocumentBatch()
    {
        $request = $this->apiConnector->disableCaching()
            ->documentsBatches($this->batchId)
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json()['id'], $this->batchId);
    }

    public function testCanGetDocumentBatchDocuments()
    {
        $request = $this->mockConnector->disableCaching()
            ->documentsBatches($this->batchId)->documents()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        foreach ($response->json() as $key => $data) {
            $this->assertSame($data['name'], $this->documents()[$key]['name']);
        }
    }

    public function testCanGetDocumentBatchDocument()
    {
        $request = $this->mockConnector->disableCaching()
            ->documentsBatches($this->batchId)->documents(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'Document 1');
    }
}
