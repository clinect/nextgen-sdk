<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Appointment
{
    private $apiConnector;
    private $mockConnector;

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/appointments/responses/1" => MockResponse::make([
                    'name' => 'Appointment Response 1',
                    'category' => 'appointment-response-1',
                ], 200),

                "{$this->url()}/appointments/waitlist-items/1" => MockResponse::make([
                    'name' => 'Appointment waitlist 1',
                    'category' => 'appointment-waitlist-1',
                ], 200),

                "{$this->url()}/*/appointments/*/healthhistoryforms" => MockResponse::make($this->healthHistoryForms(), 200),

                "{$this->url()}/*/appointments/*/healthhistoryforms/id-3" => MockResponse::make([
                    'name' => 'Appointment health history 3',
                    'category' => 'appointment-health-history-3',
                ], 200),

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
                "{$this->apiUrl()}/appointments" => MockResponse::fixture('Appointments/allAppointments'),
                "{$this->apiUrl()}/appointments/97456e4b-8575-4423-857e-ba7549d65d25" => MockResponse::fixture('Appointments/appointment'),
                "{$this->apiUrl()}/appointments/responses/1" => MockResponse::fixture('Appointments/responses'),
                "{$this->apiUrl()}/appointments/slots" => MockResponse::fixture('Appointments/slots'),
                "{$this->apiUrl()}/appointments/waitlist-items" => MockResponse::fixture('Appointments/waitListItems'),
                "{$this->apiUrl()}/appointments/waitlist-items/1" => MockResponse::fixture('Appointments/waitListItem'),
                "{$this->apiUrl()}/appointments/id-4" => MockResponse::fixture('Appointments/failedAppointment'),
            ],
        ];

        return new MockClient($response);
    }

    protected function all(): array
    {
        return [
            [
                'name' => 'Appointment 1',
                'category' => 'appointment-1',
            ], [
                'name' => 'Appointment 2',
                'category' => 'appointment-2',
            ]
        ];
    }

    protected function healthHistoryForms(): array
    {
        return [
            [
                'name' => 'Appointment health history 1',
                'category' => 'appointment-health-history-1',
            ], [
                'name' => 'Appointment health history 2',
                'category' => 'appointment-health-history-2',
            ]
        ];
    }
}
