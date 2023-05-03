<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Resources
{
    private $apiConnector;
    private $mockConnector;

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/resources" => MockResponse::make([
                    'name' => 'Resources 1',
                    'category' => 'resources-1',
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
                "{$this->apiUrl()}/resources/1" => MockResponse::fixture('Resources/resource'),
                "{$this->apiUrl()}/resources/1/appointments" => MockResponse::fixture('Resources/appointments'),
                "{$this->apiUrl()}/resources/1/appointments/1" => MockResponse::fixture('Resources/appointment'),
                "{$this->apiUrl()}/resources/1/appointments/1/status-histories" => MockResponse::fixture('Resources/statusHistories'),
            ],
        ];

        return new MockClient($response);
    }
}
