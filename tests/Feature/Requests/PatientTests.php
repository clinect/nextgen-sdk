<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Requests\PatientRequests;
use Clinect\NextGen\Tests\Stubs\Patient as PatientStub;

class PatientTests extends TestCase
{
    use PatientStub;

    public function testCanSeeAllPatients()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /{$practiceId}/patients/{$patientId}
        $request = (new PatientRequests)->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->all()[$key]['name'], $result['name']);
            $this->assertSame($this->all()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeePatient()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /{$practiceId}/patients/{$patientId}
        $request = (new PatientRequests('id-3'))->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Patient 3');
        $this->assertSame($response->json('category'), 'patient-3');
    }

    public function testPatientNotFound()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /{$practiceId}/patients/{$patientId}
        $request = (new PatientRequests('id-4'))->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }

    public function testCanSearch()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        $queryParams = ['filter'  => "",  'skip' => 300, 'orderby' => 'modifyTimestamp'];

        // Endpoint: /{$practiceId}/patients/search
        $request = (new PatientRequests)->search($queryParams);

        $response = $connector->send($request);
        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->search()[$key]['name'], $result['name']);
            $this->assertSame($this->search()[$key]['category'], $result['category']);
        }
    }
}
