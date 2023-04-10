<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Patient
{
    protected function client(string $baseUrl): MockClient
    {
        return new MockClient([
            "{$baseUrl}/*/patients" => MockResponse::make($this->all(), 200),

            "{$baseUrl}/patients/search" => MockResponse::make($this->search(), 200),

            "{$baseUrl}/*/patients/id-3" => MockResponse::make([
                'name' => 'Patient 3',
                'category' => 'patient-3',
            ], 200),

            "*" => MockResponse::make([
                'error' => 'No data available'
            ], 404),
        ]);
    }

    protected function all(): array
    {
        return [
            [
                'name' => 'Patient 1',
                'category' => 'patient-1',
            ], [
                'name' => 'Patient 2',
                'category' => 'patient-2',
            ]
        ];
    }

    protected function search(): array
    {
        return [
            [
                'name' => 'Patient Search 1',
                'category' => 'patient-search-1',
            ],

            [
                'name' => 'Patient Search 2',
                'category' => 'patient-search-2',
            ]
        ];
    }
}