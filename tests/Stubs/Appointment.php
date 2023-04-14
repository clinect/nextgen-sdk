<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Appointment
{
    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(), 
            ...[
                "{$this->url()}/appointments" => MockResponse::make($this->all(), 200),

                "{$this->url()}/appointments/id-3" => MockResponse::make([
                    'name' => 'Appointment 3',
                    'category' => 'appointment-3',
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