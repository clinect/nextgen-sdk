<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait DocumentBatches
{
    private $apiConnector;
    private $mockConnector;

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/document-batches" => MockResponse::make($this->all(), 200),
                "{$this->url()}/document-batches/1" => MockResponse::make(
                    [
                        'name' => 'Batch 1',
                        'category' => 'batch-1',
                    ],
                    200
                ),
                "{$this->url()}/document-batches/1/documents" => MockResponse::make($this->documents(), 200),
                "{$this->url()}/document-batches/1/documents/1" => MockResponse::make(
                    [
                        'name' => 'Document 1',
                        'category' => 'document-1',
                    ],
                    200
                ),
            ],
        ];

        return new MockClient($response);
    }


    protected function fixtureClient(): MockClient
    {
        $response = [
            ...$this->apiAuthorize(),
            ...[
                "{$this->apiUrl()}/document-batches" => MockResponse::fixture('DocumentBatches/batches'),
                "{$this->apiUrl()}/document-batches/1" => MockResponse::fixture('DocumentBatches/batch'),
                "{$this->apiUrl()}/document-batches/1/documents" => MockResponse::fixture('DocumentBatches/documents'),
                "{$this->apiUrl()}/document-batches/1/documents/1" => MockResponse::fixture('DocumentBatches/document'),
            ],
        ];

        return new MockClient($response);
    }

    protected function all(): array
    {
        return [
            [
                'name' => 'Batch 1',
                'category' => 'batch-1',
            ], [
                'name' => 'Batch 2',
                'category' => 'batch-2',
            ]
        ];
    }

    protected function documents(): array
    {
        return [
            [
                'name' => 'Document 1',
                'category' => 'document-1',
            ], [
                'name' => 'Document 2',
                'category' => 'document-2',
            ]
        ];
    }
}
