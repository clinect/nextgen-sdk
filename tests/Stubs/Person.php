<?php

namespace Clinect\NextGen\Tests\Stubs;

use Clinect\NextGen\Requests\BaseRequests\GetRequest;
use Saloon\Helpers\MockConfig;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Person
{
    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(), 
            ...[
                // Person
                "{$this->url()}/persons" => MockResponse::make($this->persons(), 200),
    
                "{$this->url()}/persons/lookup" => MockResponse::make($this->search(), 200),
    
                "{$this->url()}/persons/id-3" => MockResponse::make([
                    'name' => 'Person 3',
                    'category' => 'person-3',
                ], 200),
    
                // Person balances
                "{$this->url()}/persons/*/chart/balances" => MockResponse::make($this->balances(), 200),
    
                "{$this->url()}/persons/*/chart/balances/id-3" => MockResponse::make([
                    'name' => 'Person balance 3',
                    'category' => 'person-balance-3',
                ], 200),
    
                // Person charges
                "{$this->url()}/persons/*/chart/charges" => MockResponse::make($this->charges(), 200),
    
                "{$this->url()}/persons/*/chart/charges/id-3" => MockResponse::make([
                    'name' => 'Person charge 3',
                    'category' => 'person-charge-3',
                ], 200),
    
                // Person charts
                "{$this->url()}/persons/*/chart" => MockResponse::make($this->charts(), 200),
    
                "{$this->url()}/persons/*/chart/id-3" => MockResponse::make([
                    'name' => 'Person chart 3',
                    'category' => 'person-chart-3',
                ], 200),
    
                // Person encounters
                "{$this->url()}/persons/*/chart/encounters" => MockResponse::make($this->encounters(), 200),
    
                "{$this->url()}/persons/*/chart/encounters/id-3" => MockResponse::make([
                    'name' => 'Person encounter 3',
                    'category' => 'person-encounter-3',
                ], 200),
    
                // Person insurances
                "{$this->url()}/persons/*/insurances" => MockResponse::make($this->insurances(), 200),
    
                "{$this->url()}/persons/*/insurances/id-3" => MockResponse::make([
                    'name' => 'Person insurance 3',
                    'category' => 'person-insurance-3',
                ], 200),
    
                // Person insurance cards
                "{$this->url()}/persons/*/insurances/*/cards" => MockResponse::make($this->insuranceCards(), 200),
    
                "{$this->url()}/persons/*/insurances/*/cards/id-3" => MockResponse::make([
                    'name' => 'Person insurance card 3',
                    'category' => 'person-insurance-card-3',
                ], 200),
    
                "{$this->url()}/persons/*/insurances/*/cards/*/back" => MockResponse::make([
                    'name' => 'Person insurance card back 3',
                    'category' => 'person-insurance-card-back-3',
                ], 200),
    
                "{$this->url()}/persons/*/insurances/*/cards/*/front" => MockResponse::make([
                    'name' => 'Person insurance card front 3',
                    'category' => 'person-insurance-card-front-3',
                ], 200),
    
                // Error 404: Not found
                "*" => MockResponse::make([
                    'error' => 'No data available'
                ], 404),
            ],
        ];

        return new MockClient($response);
    }

    protected function fixtureClient(): MockClient
    {
        $response = [
            ...$this->apiAuthorize(),
            ...[
                "{$this->apiUrl()}/persons" => MockResponse::fixture('Person/persons'),
                "{$this->apiUrl()}/persons/1" => MockResponse::fixture('Person/person'),
                "{$this->apiUrl()}/persons/1/address-histories" => MockResponse::fixture('Person/addressHistories'),
                "{$this->apiUrl()}/persons/1/appointments" => MockResponse::fixture('Person/appointments'),
                "{$this->apiUrl()}/persons/1/eligibilities" => MockResponse::fixture('Person/eligibilities'),
                "{$this->apiUrl()}/persons/1/employers" => MockResponse::fixture('Person/employers'),
                "{$this->apiUrl()}/persons/1/employers/1" => MockResponse::fixture('Person/employer'),
                "{$this->apiUrl()}/persons/1/ethnicities" => MockResponse::fixture('Person/ethnicities'),
                "{$this->apiUrl()}/persons/1/formularies" => MockResponse::fixture('Person/Formularies/formularies'),
                "{$this->apiUrl()}/persons/1/formularies/medications/1/alternatives" => MockResponse::fixture('Person/Formularies/alternatives'),
                "{$this->apiUrl()}/persons/1/formularies/medications/1/copays/1" => MockResponse::fixture('Person/Formularies/copays'),
                "{$this->apiUrl()}/persons/1/formularies/medications/1/coverages/1" => MockResponse::fixture('Person/Formularies/coverages'),
                "{$this->apiUrl()}/persons/1/gender-identities" => MockResponse::fixture('Person/genderIdentities'),
                "{$this->apiUrl()}/persons/1/insurances" => MockResponse::fixture('Person/Insurances/insurances'),
                "{$this->apiUrl()}/persons/1/insurances/1" => MockResponse::fixture('Person/Insurances/insurance'),
                "{$this->apiUrl()}/persons/1/insurances/1/cards" => MockResponse::fixture('Person/Insurances/cards'),
                "{$this->apiUrl()}/persons/1/insurances/1/cards/1" => MockResponse::fixture('Person/Insurances/card'),
                "{$this->apiUrl()}/persons/1/insurances/1/cards/1/back" => MockResponse::fixture('Person/Insurances/backCard'),
                "{$this->apiUrl()}/persons/1/insurances/1/cards/1/front" => MockResponse::fixture('Person/Insurances/frontCard'),
                "{$this->apiUrl()}/persons/1/medication-history" => MockResponse::fixture('Person/medicationHistory'),
                "{$this->apiUrl()}/persons/1/photo" => MockResponse::fixture('Person/photo'),
                "{$this->apiUrl()}/persons/1/races" => MockResponse::fixture('Person/races'),
                "{$this->apiUrl()}/persons/1/relations" => MockResponse::fixture('Person/relations'),
                "{$this->apiUrl()}/persons/1/support-roles" => MockResponse::fixture('Person/supportRoles'),
                "{$this->apiUrl()}/persons/lookup" => MockResponse::fixture('Person/lookup'),
                "{$this->apiUrl()}/persons/merged" => MockResponse::fixture('Person/merged'),
                "{$this->apiUrl()}/persons/payers" => MockResponse::fixture('Person/payers'),
            ],
        ];

        return new MockClient($response);
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