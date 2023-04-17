<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait master
{
    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(), 
            ...[
                "{$this->url()}/master" => MockResponse::make($this->all(), 200),
    
                "{$this->url()}/master/payers" => MockResponse::make($this->all('payer'), 200),
    
                "{$this->url()}/master/payers/id-2/copays" => MockResponse::make([
                    'name' => 'Master Payer 2',
                    'category' => 'master-payer-2',
                ], 200),
            ],
        ];

        return new MockClient($response);
    }

    protected function all(string $type = 'master'): array
    {
        return $type == 'master' ? [
            [
                'name' => 'Master 1',
                'category' => 'master-1',
            ], [
                'name' => 'Master 2',
                'category' => 'master-payer-2',
            ]
        ] : [
            [
                'name' => 'Master Payer 1',
                'category' => 'master-payer-1',
            ], [
                'name' => 'Master Payer 2',
                'category' => 'master-payer-2',
            ]
            ];
    }
}
