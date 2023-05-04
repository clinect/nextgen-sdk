<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Provider as ProviderStub;

class ProvidersTests extends TestCase
{
    use ProviderStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanGetProviders()
    {
        $request = $this->apiConnector->disableCaching()
            ->providers()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        $this->assertNotEmpty($response->json()['items']);
    }

    public function testCanGetProvider()
    {
        $request = $this->apiConnector->disableCaching()->providers($this->providerId)
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('id'), $this->providerId);
    }

    public function testCanGetProviderApprovalQueues()
    {
        $request = $this->mockConnector->disableCaching()->providers($this->providerId)
            ->approvalQueue()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'approval-queue');
    }

    public function testCanGetProviderApprovalQueue()
    {
        $request = $this->mockConnector->disableCaching()->providers($this->providerId)
            ->approvalQueue(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'approval-queue 1');
    }

    public function testCanGetProviderApprovalQueueHistory()
    {
        $request = $this->mockConnector->disableCaching()->providers($this->providerId)
            ->approvalQueue()->history()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'approval-queue-history');
    }

    public function testCanGetProviderApprovalQueueComments()
    {
        $request = $this->mockConnector->disableCaching()->providers($this->providerId)
            ->approvalQueue(1)->comments()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'approval-queue comments 1');
    }

    public function testCanGetProviderDiagnosisCategories()
    {
        $request = $this->apiConnector->disableCaching()->providers($this->providerId)
            ->diagnosisCategories()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        $this->assertNotEmpty($response->json());
        foreach ($response->json()['items'] as $data) {
            $this->assertSame($data['providerId'], $this->providerId);
        }
    }

    public function testCanGetProviderDiagnosisCategoryDiagnoses()
    {
        $request = $this->apiConnector->disableCaching()->providers($this->providerId)
            ->diagnosisCategories($this->diagnosisCategoryId)->diagnoses()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetProviderDiagnosticTests()
    {
        $request = $this->apiConnector->disableCaching()->providers($this->providerId)
            ->diagnosticTests()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetProviderDurReasons()
    {
        $request = $this->apiConnector->disableCaching()->providers($this->providerId)
            ->durReasons()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetProviderEncounters()
    {
        $request = $this->apiConnector->disableCaching()->providers($this->providerId)
            ->encounters()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetProviderErxInfo()
    {
        $request = $this->mockConnector->disableCaching()->providers($this->providerId)
            ->erxInfo()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'erx-info');
    }

    public function testCanGetProviderFavoritesMedicationOrderGroups()
    {
        $request = $this->mockConnector->disableCaching()->providers($this->providerId)
            ->favorites()->medicationOrderGroups()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'favorites medication-order-groups');
    }

    public function testCanGetProviderFavoritesMedicationOrderGroup()
    {
        $request = $this->mockConnector->disableCaching()->providers($this->providerId)
            ->favorites()->medicationOrderGroups(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'favorites medication-order-groups 1');
    }

    public function testCanGetProviderFavoritesMedications()
    {
        $request = $this->mockConnector->disableCaching()->providers($this->providerId)
            ->favorites()->medications()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'favorites medications');
    }

    public function testCanGetProviderFavoritesMedication()
    {
        $request = $this->mockConnector->disableCaching()->providers($this->providerId)
            ->favorites()->medications(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'favorites medication 1');
    }

    public function testCanGetProviderLabTests()
    {
        $request = $this->apiConnector->disableCaching()->providers($this->providerId)
            ->labTests()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetProviderMedicationRefillRequests()
    {
        $request = $this->apiConnector->disableCaching()->providers($this->providerId)
            ->medicationRefillRequests()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetProviderMedicationRefillRequest()
    {
        $request = $this->mockConnector->disableCaching()->providers($this->providerId)
            ->medicationRefillRequests(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication-refill-requests 1');
    }
}
