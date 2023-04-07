<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Appointment
{
    protected function client(string $baseUrl): MockClient
    {
        return new MockClient([
            "{$baseUrl}/appointments" => MockResponse::make($this->all(), 200),

            "{$baseUrl}/appointments/id-3" => MockResponse::make([
                'name' => 'Appointment 3',
                'category' => 'appointment-3',
            ], 200),

            "{$baseUrl}/appointments/*" => MockResponse::make([
                'error' => 'No data available'
            ], 404),
        ]);
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
}