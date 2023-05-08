<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait AuditEvent
{
    private $apiConnector;
    private $mockConnector;

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[

                "{$this->url()}/audit/events/1" => MockResponse::make([
                    'name' => 'Audit Event 1',
                ], 200),

                "{$this->url()}/audit/events/1/account" => MockResponse::make(
                    [
                        'name' => 'Audit Event account 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/allergy" => MockResponse::make(
                    [
                        'name' => 'Audit Event allergy 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/application-access" => MockResponse::make(
                    [
                        'name' => 'Audit Event application access 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/data-trail-items" => MockResponse::make(
                    [
                        'name' => 'Audit Event data trail items 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/diagnosis" => MockResponse::make(
                    [
                        'name' => 'Audit Event diagnosis 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/encounter" => MockResponse::make(
                    [
                        'name' => 'Audit Event encounter 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/ics" => MockResponse::make(
                    [
                        'name' => 'Audit Event ics 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/interface-holding-tank" => MockResponse::make(
                    [
                        'name' => 'Audit Event interface holding tank 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/interoperability" => MockResponse::make(
                    [
                        'name' => 'Audit Event interoperability 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/medication" => MockResponse::make(
                    [
                        'name' => 'Audit Event medication 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/order" => MockResponse::make(
                    [
                        'name' => 'Audit Event order 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/paq" => MockResponse::make(
                    [
                        'name' => 'Audit Event paq 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/patient-education" => MockResponse::make(
                    [
                        'name' => 'Audit Event patient education 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/procedure" => MockResponse::make(
                    [
                        'name' => 'Audit Event procedure 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/rosetta" => MockResponse::make(
                    [
                        'name' => 'Audit Event rosetta 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/security" => MockResponse::make(
                    [
                        'name' => 'Audit Event security 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/1/template" => MockResponse::make(
                    [
                        'name' => 'Audit Event template 1',
                    ],
                    200
                ),

                "{$this->url()}/audit/events/performance" => MockResponse::make(
                    [
                        'name' => 'Audit Event performance 1',
                    ],
                    200
                ),

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
                "{$this->apiUrl()}/audit/events/1" => MockResponse::fixture('AuditEvent/auditEvent'),
                "{$this->apiUrl()}/audit/events/1/account" => MockResponse::fixture('AuditEvent/account'),
                "{$this->apiUrl()}/audit/events/1/allergy" => MockResponse::fixture('AuditEvent/allergy'),
                "{$this->apiUrl()}/audit/events/1/application-access" => MockResponse::fixture('AuditEvent/application-access'),
                "{$this->apiUrl()}/audit/events/1/data-trail-items" => MockResponse::fixture('AuditEvent/data-trail-items'),
                "{$this->apiUrl()}/audit/events/1/diagnosis" => MockResponse::fixture('AuditEvent/diagnosis'),
                "{$this->apiUrl()}/audit/events/1/encounter" => MockResponse::fixture('AuditEvent/encounter'),
                "{$this->apiUrl()}/audit/events/1/ics" => MockResponse::fixture('AuditEvent/ics'),
                "{$this->apiUrl()}/audit/events/1/interface-holding-tank" => MockResponse::fixture('AuditEvent/interface-holding-tank'),
                "{$this->apiUrl()}/audit/events/1/interoperability" => MockResponse::fixture('AuditEvent/interoperability'),
                "{$this->apiUrl()}/audit/events/1/medication" => MockResponse::fixture('AuditEvent/medication'),
                "{$this->apiUrl()}/audit/events/1/order" => MockResponse::fixture('AuditEvent/order'),
                "{$this->apiUrl()}/audit/events/1/paq" => MockResponse::fixture('AuditEvent/paq'),
                "{$this->apiUrl()}/audit/events/1/patient-education" => MockResponse::fixture('AuditEvent/patient-education'),
                "{$this->apiUrl()}/audit/events/1/procedure" => MockResponse::fixture('AuditEvent/procedure'),
                "{$this->apiUrl()}/audit/events/1/rosetta" => MockResponse::fixture('AuditEvent/rosetta'),
                "{$this->apiUrl()}/audit/events/1/security" => MockResponse::fixture('AuditEvent/security'),
                "{$this->apiUrl()}/audit/events/1/template" => MockResponse::fixture('AuditEvent/template'),
                "{$this->apiUrl()}/audit/events/performance" => MockResponse::fixture('AuditEvent/performance'),
            ],
        ];

        return new MockClient($response);
    }

    protected function all(): array
    {
        return [
            [
                'name' => 'Audit Event 1',
                'category' => 'audit-event-1',
            ], [
                'name' => 'Audit Event 2',
                'category' => 'audit-event-2',
            ]
        ];
    }
}
