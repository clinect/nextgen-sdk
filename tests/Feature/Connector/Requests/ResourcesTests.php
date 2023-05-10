<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Resources as ResourcesStub;

class ResourcesTests extends TestCase
{
    use ResourcesStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanGetResources()
    {
        $request = $this->apiConnector->disableCaching()
            ->resources()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        $this->assertNotEmpty($response->json()['items']);
    }

    public function testCanGetResource()
    {
        $request = $this->apiConnector->disableCaching()
            ->resources($this->resourceId)
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('id'), $this->resourceId);
    }

    public function testCanGetResourceAppointments()
    {
        $request = $this->apiConnector->disableCaching()
            ->resources($this->resourceId)->appointments()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
    }
    public function testCanGetResourceAppointment()
    {
        $request = $this->mockConnector->disableCaching()
            ->resources($this->resourceId)->appointments(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'appointment 1');
    }

    public function testCanGetResourceAppointmentStatusHistories()
    {
        $request = $this->mockConnector->disableCaching()
            ->resources($this->resourceId)->appointments(1)->statusHistories()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'appointment status-histories');
    }
}
