<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\AuditEvent as AuditEventStub;

class AuditEventsTests extends TestCase
{
    use AuditEventStub;
    private $apiConnector;
    private $mockConnector;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanSeeAuditEvent()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event 1');
        // add assertions
    }

    public function testCanSeeAuditEventAccount()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->account()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event account 1');
        // add assertions
    }

    public function testCanSeeAuditEventAllergy()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->allergy()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event allergy 1');
        // add assertions
    }

    public function testCanSeeAuditEventApplicationAccess()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->applicationAccess()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event application access 1');
        // add assertions
    }

    public function testCanSeeAuditEventDataTrailItems()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->dataTrailItems()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event data trail items 1');
        // add assertions
    }

    public function testCanSeeAuditEventDiagnosis()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->diagnosis()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event diagnosis 1');
        // add assertions
    }

    public function testCanSeeAuditEventEncounter()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->encounter()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event encounter 1');
        // add assertions
    }

    public function testCanSeeAuditEventIcs()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->ics()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event ics 1');
        // add assertions
    }

    public function testCanSeeAuditEventInterfaceHoldingTank()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->interfaceHoldingTank()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event interface holding tank 1');
        // add assertions
    }

    public function testCanSeeAuditEventInteroperability()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->interoperability()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event interoperability 1');
        // add assertions
    }

    public function testCanSeeAuditEventMedication()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->medication()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event medication 1');
        // add assertions
    }

    public function testCanSeeAuditEventOrder()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->order()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event order 1');
        // add assertions
    }

    public function testCanSeeAuditEventPaq()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->paq()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event paq 1');
        // add assertions
    }

    public function testCanSeeAuditEventPatientEducation()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->patientEducation()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event patient education 1');
        // add assertions
    }

    public function testCanSeeAuditEventProcedure()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->procedure()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event procedure 1');
        // add assertions
    }

    public function testCanSeeAuditEventRosetta()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->rosetta()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event rosetta 1');
        // add assertions
    }

    public function testCanSeeAuditEventSecurity()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->security()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event security 1');
        // add assertions
    }

    public function testCanSeeAuditEventTemplate()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents(1)->template()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event template 1');
        // add assertions
    }

    public function testCanSeeAuditEventPerformance()
    {
        $request = $this->mockConnector->disableCaching()
            ->auditEvents()->performance()->get();

        $response = $this->mockConnector->send($request);
        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Audit Event performance 1');
        // add assertions
    }
}
