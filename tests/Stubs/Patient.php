<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Patient
{
    private $apiConnector;
    private $mockConnector;

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/*/patients" => MockResponse::make($this->all(), 200),

                "{$this->url()}/patients/search" => MockResponse::make($this->search(), 200),

                "{$this->url()}/*/patients/1" => MockResponse::make([
                    'name' => 'Patient 3',
                    'category' => 'patient-3',
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
