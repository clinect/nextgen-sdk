<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\PatientDocument as PatientDocumentStub;

class PatientDocumentTests extends TestCase
{
    use PatientDocumentStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanGetPatientDocumentHistories()
    {
        $request = $this->mockConnector->disableCaching()->persons(1)
            ->chart()->patientDocuments(1)->history()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json() as $key => $data) {
            $this->assertSame($data['name'], $this->all()[$key]['name']);
        }
    }
}
