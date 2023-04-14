<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Chart
{
    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(), 
            ...[
                "{$this->url()}/chart" => MockResponse::make($this->all(), 200),
    
                "{$this->url()}/chart/id-3" => MockResponse::make([
                    'name' => 'Chart 3',
                    'category' => 'chart-3',
                ], 200),
    
                "{$this->url()}/chart/*" => MockResponse::make([
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
                'name' => 'Chart 1',
                'category' => 'chart-1',
            ], [
                'name' => 'Chart 2',
                'category' => 'chart-2',
            ]
        ];
    }
}