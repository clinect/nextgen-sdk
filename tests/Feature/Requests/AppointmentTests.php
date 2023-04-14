<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\AppointmentRequests;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Appointment as AppointmentStub;

class AppointmentTests extends TestCase
{
    use AppointmentStub;

    public function testCanSeeAllAppointments()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        $request = (new AppointmentRequests)->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->all()[$key]['name'], $result['name']);
            $this->assertSame($this->all()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeAppointment()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /appointments/{$appointmentId}
        $request = (new AppointmentsRequest('id-3'))->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Appointment 3');
        $this->assertSame($response->json('category'), 'appointment-3');
    }

    public function testAppointmentNotFound()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /appointments/{$appointmentId}
        $request = (new AppointmentsRequest('id-4'))->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
