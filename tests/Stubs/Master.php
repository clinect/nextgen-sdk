<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait master
{
    protected function client(string $baseUrl): MockClient
    {
        return new MockClient([
            "{$baseUrl}/master" => MockResponse::make($this->all(), 200),

            "{$baseUrl}/master/payers" => MockResponse::make($this->all('payer'), 200),

            "{$baseUrl}/master/payers/id-2" => MockResponse::make([
                'name' => 'Master Payer 2',
                'category' => 'master-payer-2',
            ], 200),
        ]);
    }

    protected function all($type = 'master'): array
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
