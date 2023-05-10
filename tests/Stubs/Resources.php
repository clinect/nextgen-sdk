<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Resources
{
    private $apiConnector;
    private $mockConnector;
    private $resourceId = "1984e9e2-df9c-4a91-a2e4-10f6af2a3305";

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/resources/{$this->resourceId}/appointments/1" => MockResponse::make([
                    'name' => 'appointment 1',
                ], 200),

                "{$this->url()}/resources/{$this->resourceId}/appointments/1/status-histories" => MockResponse::make([
                    'name' => 'appointment status-histories',
                ], 200),
            ],
        ];

        return new MockClient($response);
    }


    protected function fixtureClient(): MockClient
    {
        $response = [
            ...$this->apiAuthorize(),
            ...[
                "{$this->apiUrl()}/resources" => MockResponse::fixture('Resources/resources'),
                "{$this->apiUrl()}/resources/{$this->resourceId}" => MockResponse::fixture('Resources/resource'),
                "{$this->apiUrl()}/resources/{$this->resourceId}/appointments" => MockResponse::fixture('Resources/appointments'),
                "{$this->apiUrl()}/resources/{$this->resourceId}/appointments/1" => MockResponse::fixture('Resources/appointment'),
                "{$this->apiUrl()}/resources/{$this->resourceId}/appointments/1/status-histories" => MockResponse::fixture('Resources/statusHistories'),
            ],
        ];

        return new MockClient($response);
    }
}
