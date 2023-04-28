<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\AuditEvent as AuditEventStub;

class AuditEventsTests extends TestCase
{
    use AuditEventStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanGetAuditEvent()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event 1');
        // add assertions
    }

    public function testCanGetAuditEventAccount()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->account()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event account 1');
        // add assertions
    }

    public function testCanGetAuditEventAllergy()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->allergy()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event allergy 1');
        // add assertions
    }

    public function testCanGetAuditEventApplicationAccess()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->applicationAccess()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event application access 1');
        // add assertions
    }

    public function testCanGetAuditEventDataTrailItems()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->dataTrailItems()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event data trail items 1');
        // add assertions
    }

    public function testCanGetAuditEventDiagnosis()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->diagnosis()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event diagnosis 1');
        // add assertions
    }

    public function testCanGetAuditEventEncounter()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->encounter()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event encounter 1');
        // add assertions
    }

    public function testCanGetAuditEventIcs()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->ics()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event ics 1');
        // add assertions
    }

    public function testCanGetAuditEventInterfaceHoldingTank()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->interfaceHoldingTank()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event interface holding tank 1');
        // add assertions
    }

    public function testCanGetAuditEventInteroperability()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->interoperability()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event interoperability 1');
        // add assertions
    }

    public function testCanGetAuditEventMedication()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->medication()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event medication 1');
        // add assertions
    }

    public function testCanGetAuditEventOrder()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->order()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event order 1');
        // add assertions
    }

    public function testCanGetAuditEventPaq()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->paq()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event paq 1');
        // add assertions
    }

    public function testCanGetAuditEventPatientEducation()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->patientEducation()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event patient education 1');
        // add assertions
    }

    public function testCanGetAuditEventProcedure()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->procedure()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event procedure 1');
        // add assertions
    }

    public function testCanGetAuditEventRosetta()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->rosetta()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event rosetta 1');
        // add assertions
    }

    public function testCanGetAuditEventSecurity()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->security()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event security 1');
        // add assertions
    }

    public function testCanGetAuditEventTemplate()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->template()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event template 1');
        // add assertions
    }

    public function testCanGetAuditEventPerformance()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents()->performance()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event performance 1');
        // add assertions
    }
}
