<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Core
{
    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/core/version" => MockResponse::make([
                    'name' => 'Version 2',
                    'category' => 'version-2',
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
                "{$this->apiUrl()}/core/version" => MockResponse::fixture('Core/version'),
            ],
        ];

        return new MockClient($response);
    }
}
