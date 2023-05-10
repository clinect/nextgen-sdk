<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Financial
{
    private $apiConnector;
    private $mockConnector;
    private $batchId = "2023040500060001";

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/financial/guarantors/1/account" => MockResponse::make(
                    [
                        'name' => 'Guarantor Name 1',
                    ],
                    200
                ),
                "{$this->url()}/financial/transactions" => MockResponse::make($this->transactions(), 200),
                "{$this->url()}/financial/transactions/1" => MockResponse::make(
                    [
                        'name' => 'Transaction 1',
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
                "{$this->apiUrl()}/financial/batches" => MockResponse::fixture('Financial/batches'),
                "{$this->apiUrl()}/financial/batches/{$this->batchId}" => MockResponse::fixture('Financial/batch'),
                "{$this->apiUrl()}/financial/guarantors/1/account" => MockResponse::fixture('Financial/guarantorsAccount'),
                "{$this->apiUrl()}/financial/transactions" => MockResponse::fixture('Financial/transactions'),
                "{$this->apiUrl()}/financial/transactions/1" => MockResponse::fixture('Financial/transaction'),
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

    protected function transactions(): array
    {
        return [
            [
                'name' => 'Transaction 1',
            ], [
                'name' => 'Transaction 2',
            ]
        ];
    }
}
