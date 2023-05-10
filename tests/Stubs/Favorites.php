<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Favorites
{
    private $apiConnector;
    private $mockConnector;

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/favorites/medications/1/custom-dosage-orders" => MockResponse::make($this->all(), 200),
            ],
        ];

        return new MockClient($response);
    }


    protected function fixtureClient(): MockClient
    {
        $response = [
            ...$this->apiAuthorize(),
            ...[
                "{$this->apiUrl()}/favorites/medications/1/custom-dosage-orders" => MockResponse::fixture('Favorites/customDosageOrders'),
            ],
        ];

        return new MockClient($response);
    }

    protected function all(): array
    {
        return [
            [
                'name' => 'Order 1',
                'category' => 'order-1',
            ], [
                'name' => 'Order 2',
                'category' => 'order-2',
            ]
        ];
    }
}
