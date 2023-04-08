<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Chart
{
    protected function client(string $baseUrl): MockClient
    {
        return new MockClient([
            "{$baseUrl}/chart" => MockResponse::make($this->all(), 200),

            "{$baseUrl}/chart/id-3" => MockResponse::make([
                'name' => 'Chart 3',
                'category' => 'chart-3',
            ], 200),

            "{$baseUrl}/chart/*" => MockResponse::make([
                'error' => 'No data available'
            ], 404),
        ]);
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