<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests\Appointments;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Appointment as AppointmentStub;

class HealthHistoryFormTests extends TestCase
{
    use AppointmentStub;

    public function testCanSeeAllAppointmentHealthHistoryForms()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));
        // Endpoint: /{$practiceId}/appointments/{$appointmentId}/healthhistoryforms
        $request = $connector->appointments('appointment-id')->withPracticeId('practice-id')->healthHistoryForms()->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->healthHistoryForms()[$key]['name'], $result['name']);
            $this->assertSame($this->healthHistoryForms()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeAppointmentHealthHistoryForm()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /{$practiceId}/appointments/{$appointmentId}/healthhistoryforms/{$healthHistoryFormId}
        $request = $connector->appointments('appointment-id')->withPracticeId('practice-id')->healthHistoryForms('id-3')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Appointment health history 3');
        $this->assertSame($response->json('category'), 'appointment-health-history-3');
    }

    public function testAppointmentHealthHistoryFormNotFound()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /{$practiceId}/appointments/{$appointmentId}/healthhistoryforms/{$healthHistoryFormId}
        $request = $connector->appointments('appointment-id')->withPracticeId('practice-id')->healthHistoryForms('id-4')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
