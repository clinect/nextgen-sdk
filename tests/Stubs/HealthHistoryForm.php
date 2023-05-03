<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait HealthHistoryForm
{
    private $apiConnector;
    private $mockConnector;

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/*/healthhistoryforms" => MockResponse::make($this->all(), 200),

                "{$this->url()}/*/healthhistoryforms/1" => MockResponse::make([
                    'name' => 'Health history 1',
                    'category' => 'health-history-1',
                ], 200),

                "*" => MockResponse::make([
                    'error' => 'No data available'
                ], 404),
            ],
        ];

        return new MockClient($response);
    }

    protected function all(): array
    {
        return [
            [
                'name' => 'Health history 1',
                'category' => 'health-history-1',
            ], [
                'name' => 'Health history 2',
                'category' => 'health-history-2',
            ]
        ];
    }
}
