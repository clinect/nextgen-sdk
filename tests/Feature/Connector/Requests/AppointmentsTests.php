<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Appointment as AppointmentStub;

class AppointmentsTests extends TestCase
{
    use AppointmentStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanGetAllAppointments()
    {
        $request = $this->apiConnector->disableCaching()->appointments()->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        $this->assertNotEmpty($response->json()['items']);
    }

    public function testCanGetAppointmentsSlot()
    {
        $request = $this->apiConnector->disableCaching()->appointments()->slots()->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetAppointmentsWaitListItems()
    {
        $request = $this->apiConnector->disableCaching()->appointments()->waitlistItems()->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetAppointment()
    {
        $appointmentId = "97456e4b-8575-4423-857e-ba7549d65d25";
        $request = $this->apiConnector->appointments($appointmentId)->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json()['id'], $appointmentId);
    }

    public function testCanGetAppointmentResponse()
    {
        $request = $this->mockConnector->appointments()->responses(1)->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Appointment Response 1');
        $this->assertSame($response->json('category'), 'appointment-response-1');
    }

    public function testCanGetAppointmentsWaitListItem()
    {
        $request = $this->mockConnector->appointments()->waitlistItems(1)->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Appointment waitlist 1');
        $this->assertSame($response->json('category'), 'appointment-waitlist-1');
    }

    public function testAppointmentNotFound()
    {
        $request = $this->apiConnector->appointments('id-4')->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 400);
        $this->assertSame($response->json('message'), "The value 'id-4' is not valid for Guid.");
    }
}
