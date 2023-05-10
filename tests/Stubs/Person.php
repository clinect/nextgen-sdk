<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Person
{
    private $apiConnector;
    private $mockConnector;
    private $personId = "1c5d22d3-cc33-4082-98ad-7a58c637f646";

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                // Person
                "{$this->url()}/persons" => MockResponse::make($this->persons(), 200),

                "{$this->url()}/persons/{$this->personId}/employers" => MockResponse::make([
                    'name' => 'employers',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/employers/1" => MockResponse::make([
                    'name' => 'employer 1',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/formularies" => MockResponse::make([
                    'name' => 'formularies',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/formularies/medications/1/alternatives" => MockResponse::make([
                    'name' => 'formularies alternatives',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/formularies/medications/1/copays/1" => MockResponse::make([
                    'name' => 'formularies copays',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/formularies/medications/1/coverages/1" => MockResponse::make([
                    'name' => 'formularies coverages',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/gender-identities" => MockResponse::make([
                    'name' => 'gender-identities',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/insurances/1" => MockResponse::make([
                    'name' => 'insurance',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/insurances/1/cards" => MockResponse::make([
                    'name' => 'insurance cards',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/insurances/1/cards/1" => MockResponse::make([
                    'name' => 'insurance card',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/insurances/1/cards/1/back" => MockResponse::make([
                    'name' => 'insurance card back',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/insurances/1/cards/1/front" => MockResponse::make([
                    'name' => 'insurance card front',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/medication-history" => MockResponse::make([
                    'name' => 'medication-history',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/photo" => MockResponse::make([
                    'name' => 'photo',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/relations" => MockResponse::make([
                    'name' => 'relations',
                ], 200),

                "{$this->url()}/persons/{$this->personId}/support-roles" => MockResponse::make([
                    'name' => 'support-roles',
                ], 200),

                "{$this->url()}/persons/lookup" => MockResponse::make([
                    'name' => 'lookup',
                ], 200),

                "{$this->url()}/persons/merged" => MockResponse::make([
                    'name' => 'merged',
                ], 200),

                "{$this->url()}/persons/payers" => MockResponse::make([
                    'name' => 'payers',
                ], 200),
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
                "{$this->apiUrl()}/persons/{$this->personId}" => MockResponse::fixture('Person/person'),
                "{$this->apiUrl()}/persons/{$this->personId}/address-histories" => MockResponse::fixture('Person/addressHistories'),
                "{$this->apiUrl()}/persons/{$this->personId}/appointments" => MockResponse::fixture('Person/appointments'),
                "{$this->apiUrl()}/persons/{$this->personId}/eligibilities" => MockResponse::fixture('Person/eligibilities'),
                "{$this->apiUrl()}/persons/{$this->personId}/employers" => MockResponse::fixture('Person/employers'),
                "{$this->apiUrl()}/persons/{$this->personId}/employers/1" => MockResponse::fixture('Person/employer'),
                "{$this->apiUrl()}/persons/{$this->personId}/ethnicities" => MockResponse::fixture('Person/ethnicities'),
                "{$this->apiUrl()}/persons/{$this->personId}/formularies" => MockResponse::fixture('Person/Formularies/formularies'),
                "{$this->apiUrl()}/persons/{$this->personId}/formularies/medications/1/alternatives" => MockResponse::fixture('Person/Formularies/alternatives'),
                "{$this->apiUrl()}/persons/{$this->personId}/formularies/medications/1/copays/1" => MockResponse::fixture('Person/Formularies/copays'),
                "{$this->apiUrl()}/persons/{$this->personId}/formularies/medications/1/coverages/1" => MockResponse::fixture('Person/Formularies/coverages'),
                "{$this->apiUrl()}/persons/{$this->personId}/gender-identities" => MockResponse::fixture('Person/genderIdentities'),
                "{$this->apiUrl()}/persons/{$this->personId}/insurances" => MockResponse::fixture('Person/Insurances/insurances'),
                "{$this->apiUrl()}/persons/{$this->personId}/insurances/1" => MockResponse::fixture('Person/Insurances/insurance'),
                "{$this->apiUrl()}/persons/{$this->personId}/insurances/1/cards" => MockResponse::fixture('Person/Insurances/cards'),
                "{$this->apiUrl()}/persons/{$this->personId}/insurances/1/cards/1" => MockResponse::fixture('Person/Insurances/card'),
                "{$this->apiUrl()}/persons/{$this->personId}/insurances/1/cards/1/back" => MockResponse::fixture('Person/Insurances/backCard'),
                "{$this->apiUrl()}/persons/{$this->personId}/insurances/1/cards/1/front" => MockResponse::fixture('Person/Insurances/frontCard'),
                "{$this->apiUrl()}/persons/{$this->personId}/medication-history" => MockResponse::fixture('Person/medicationHistory'),
                "{$this->apiUrl()}/persons/{$this->personId}/photo" => MockResponse::fixture('Person/photo'),
                "{$this->apiUrl()}/persons/{$this->personId}/races" => MockResponse::fixture('Person/races'),
                "{$this->apiUrl()}/persons/{$this->personId}/relations" => MockResponse::fixture('Person/relations'),
                "{$this->apiUrl()}/persons/{$this->personId}/support-roles" => MockResponse::fixture('Person/supportRoles'),
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
