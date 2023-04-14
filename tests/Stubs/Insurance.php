<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Insurance
{
    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(), 
            ...[
                "{$this->url()}/insurances" => MockResponse::make($this->all(), 200),
    
                "{$this->url()}/insurances/id-2" => MockResponse::make([
                    'name' => 'Insurance 2',
                    'category' => 'insurance-2',
                ], 200),
    
                "{$this->url()}/insurances/id-3/href_insurance" => MockResponse::make([
                    'name' => 'Insurance 3',
                    'category' => 'insurance-3',
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
                'name' => 'Insurance 1',
                'category' => 'insurance-1',
            ], [
                'name' => 'Insurance 2',
                'category' => 'insurance-2',
            ], [
                'name' => 'Insurance 3',
                'category' => 'insurance-3',
            ]
        ];
    }
}
