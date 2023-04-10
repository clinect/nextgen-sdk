<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Requests\PatientRequests;
use Clinect\NextGen\Tests\Stubs\Patient as PatientStub;

class PatientTests extends TestCase
{
    use PatientStub;

    public function testCanSeeAllPatients()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

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
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /{$practiceId}/patients/{$patientId}
        $request = (new PatientRequests('id-3'))->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Patient 3');
        $this->assertSame($response->json('category'), 'patient-3');
    }

    public function testPatientNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /{$practiceId}/patients/{$patientId}
        $request = (new PatientRequests('id-4'))->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }

    public function testCanSearch()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

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
