<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Department
{
    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(), 
            ...[
                "{$this->url()}/*/departments" => MockResponse::make($this->all(), 200),
    
                "{$this->url()}/*/departments/id-3" => MockResponse::make([
                    'name' => 'Department 3',
                    'category' => 'department-3',
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
                'name' => 'Department 1',
                'category' => 'department-1',
            ], [
                'name' => 'Department 2',
                'category' => 'department-2',
            ]
        ];
    }
}