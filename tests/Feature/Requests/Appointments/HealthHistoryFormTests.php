<?php

namespace Clinect\NextGen\Tests\Feature\Requests\Appointments;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Requests\AppointmentsRequest;
use Clinect\NextGen\Tests\Stubs\Appointment as AppointmentStub;

class HealthHistoryFormTests extends TestCase
{
    use AppointmentStub;

    public function testCanSeeAllAppointmentHealthHistoryForms()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /{$practiceId}/appointments/{$appointmentId}/healthhistoryforms
        $request = (new AppointmentsRequest('appointment-id'))->withPracticeId('practice-id')->healthHistoryForms()->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->healthHistoryForms()[$key]['name'], $result['name']);
            $this->assertSame($this->healthHistoryForms()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeAppointmentHealthHistoryForm()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /{$practiceId}/appointments/{$appointmentId}/healthhistoryforms/{$healthHistoryFormId}
        $request = (new AppointmentsRequest('appointment-id'))->withPracticeId('practice-id')->healthHistoryForms('id-3')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Appointment health history 3');
        $this->assertSame($response->json('category'), 'appointment-health-history-3');
    }

    public function testAppointmentHealthHistoryFormNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /{$practiceId}/appointments/{$appointmentId}/healthhistoryforms/{$healthHistoryFormId}
        $request = (new AppointmentsRequest('appointment-id'))->withPracticeId('practice-id')->healthHistoryForms('id-4')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
