<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Person
{
    protected function client(string $baseUrl): MockClient
    {
        return new MockClient([
            // Person
            "{$baseUrl}/persons" => MockResponse::make($this->persons(), 200),

            "{$baseUrl}/persons/lookup" => MockResponse::make($this->search(), 200),

            "{$baseUrl}/persons/id-3" => MockResponse::make([
                'name' => 'Person 3',
                'category' => 'person-3',
            ], 200),

            // Person balances
            "{$baseUrl}/persons/*/chart/balances" => MockResponse::make($this->balances(), 200),

            "{$baseUrl}/persons/*/chart/balances/id-3" => MockResponse::make([
                'name' => 'Person balance 3',
                'category' => 'person-balance-3',
            ], 200),

            // Person charges
            "{$baseUrl}/persons/*/chart/charges" => MockResponse::make($this->charges(), 200),

            "{$baseUrl}/persons/*/chart/charges/id-3" => MockResponse::make([
                'name' => 'Person charge 3',
                'category' => 'person-charge-3',
            ], 200),

            // Person charts
            "{$baseUrl}/persons/*/chart" => MockResponse::make($this->charts(), 200),

            "{$baseUrl}/persons/*/chart/id-3" => MockResponse::make([
                'name' => 'Person chart 3',
                'category' => 'person-chart-3',
            ], 200),

            // Person encounters
            "{$baseUrl}/persons/*/chart/encounters" => MockResponse::make($this->encounters(), 200),

            "{$baseUrl}/persons/*/chart/encounters/id-3" => MockResponse::make([
                'name' => 'Person encounter 3',
                'category' => 'person-encounter-3',
            ], 200),

            // Person insurances
            "{$baseUrl}/persons/*/insurances" => MockResponse::make($this->insurances(), 200),

            "{$baseUrl}/persons/*/insurances/id-3" => MockResponse::make([
                'name' => 'Person insurance 3',
                'category' => 'person-insurance-3',
            ], 200),

            // Person insurance cards
            "{$baseUrl}/persons/*/insurances/*/cards" => MockResponse::make($this->insuranceCards(), 200),

            "{$baseUrl}/persons/*/insurances/*/cards/id-3" => MockResponse::make([
                'name' => 'Person insurance card 3',
                'category' => 'person-insurance-card-3',
            ], 200),

            "{$baseUrl}/persons/*/insurances/*/cards/*/back" => MockResponse::make([
                'name' => 'Person insurance card back 3',
                'category' => 'person-insurance-card-back-3',
            ], 200),

            "{$baseUrl}/persons/*/insurances/*/cards/*/front" => MockResponse::make([
                'name' => 'Person insurance card front 3',
                'category' => 'person-insurance-card-front-3',
            ], 200),

            // Error 404: Not found
            "*" => MockResponse::make([
                'error' => 'No data available'
            ], 404),
        ]);
    }

    protected function persons(): array
    {
        return [
            [
                'name' => 'Person 1',
                'category' => 'person-1',
            ], [
                'name' => 'Person 2',
                'category' => 'person-2',
            ]
        ];
    }

    protected function balances(): array
    {
        return [
            [
                'name' => 'Person balance 1',
                'category' => 'person-balance-1',
            ], [
                'name' => 'Person balance 2',
                'category' => 'person-balance-2',
            ]
        ];
    }

    protected function charges(): array
    {
        return [
            [
                'name' => 'Person charge 1',
                'category' => 'person-charge-1',
            ], [
                'name' => 'Person charge 2',
                'category' => 'person-charge-2',
            ]
        ];
    }

    protected function charts(): array
    {
        return [
            [
                'name' => 'Person chart 1',
                'category' => 'person-chart-1',
            ], [
                'name' => 'Person chart 2',
                'category' => 'person-chart-2',
            ]
        ];
    }

    protected function encounters(): array
    {
        return [
            [
                'name' => 'Person encounter 1',
                'category' => 'person-encounter-1',
            ], [
                'name' => 'Person encounter 2',
                'category' => 'person-encounter-2',
            ]
        ];
    }

    protected function insurances(): array
    {
        return [
            [
                'name' => 'Person insurance 1',
                'category' => 'person-insurance-1',
            ], [
                'name' => 'Person insurance 2',
                'category' => 'person-insurance-2',
            ]
        ];
    }

    protected function insuranceCards(): array
    {
        return [
            [
                'name' => 'Person insurance card 1',
                'category' => 'person-insurance-card-1',
            ], [
                'name' => 'Person insurance card 2',
                'category' => 'person-insurance-card-2',
            ]
        ];
    }
    
    protected function search(): array
    {
        return [
            [
                'name' => 'Person Search 1',
                'category' => 'person-search-1',
            ],

            [
                'name' => 'Person Search 2',
                'category' => 'person-search-2',
            ]
        ];
    }
}