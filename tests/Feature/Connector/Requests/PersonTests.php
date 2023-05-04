<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class PersonTests extends TestCase
{
    use PersonStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanGetPersons()
    {
        $request = $this->mockConnector->disableCaching()->persons()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->persons()[$key]['name'], $result['name']);
            $this->assertSame($this->persons()[$key]['category'], $result['category']);
        }
    }

    public function testCanGetPerson()
    {
        $request = $this->apiConnector->disableCaching()->persons($this->personId)
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('id'), $this->personId);
    }

    public function testCanGetPersonAddressHistories()
    {
        $request = $this->apiConnector->disableCaching()->persons($this->personId)
            ->addressHistories()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetPersonAppointments()
    {
        $request = $this->apiConnector->disableCaching()->persons($this->personId)
            ->appointments()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        foreach ($response->json()['items'] as $data) {
            $this->assertSame($data['personId'], $this->personId);
        }
    }

    public function testCanGetPersonEligibilities()
    {
        $request = $this->apiConnector->disableCaching()->persons($this->personId)
            ->eligibilities()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPersonEmployers()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->employers()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'employers');
    }

    public function testCanGetPersonEmployer()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->employers(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'employer 1');
    }

    public function testCanGetPersonEthnicities()
    {
        $request = $this->apiConnector->disableCaching()->persons($this->personId)
            ->ethnicities()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json() as $data) {
            $this->assertSame($data['personId'], $this->personId);
        }
    }

    public function testCanGetPersonFormularies()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->formularies()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'formularies');
    }

    public function testCanGetPersonFormulariesMedicationAlternative()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->formularies()->medications(1)->alternatives()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'formularies alternatives');
    }

    public function testCanGetPersonFormulariesMedicationCopays()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->formularies()->medications(1)->copays(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'formularies copays');
    }

    public function testCanGetPersonFormulariesMedicationCoverages()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->formularies()->medications(1)->coverages(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'formularies coverages');
    }

    public function testCanGetPersonGenderIdentities()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->genderIdentities()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'gender-identities');
    }

    public function testCanGetPersonInsurances()
    {
        $request = $this->apiConnector->disableCaching()->persons($this->personId)
            ->insurances()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetPersonInsurance()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->insurances(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'insurance');
    }

    public function testCanGetPersonInsuranceCards()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->insurances(1)->cards()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'insurance cards');
    }

    public function testCanGetPersonInsuranceCard()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->insurances(1)->cards(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'insurance card');
    }

    public function testCanGetPersonInsuranceCardBack()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->insurances(1)->cards(1)->back()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'insurance card back');
    }

    public function testCanGetPersonInsuranceCardFront()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->insurances(1)->cards(1)->front()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'insurance card front');
    }

    public function testCanGetPersonMedicationHistory()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->medicationHistory()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication-history');
    }

    public function testCanGetPersonPhoto()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->photo()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'photo');
    }

    public function testCanGetPersonRaces()
    {
        $request = $this->apiConnector->disableCaching()->persons($this->personId)
            ->races()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json() as $data) {
            $this->assertSame($data['personId'], $this->personId);
        }
    }

    public function testCanGetPersonRelations()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->relations()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'relations');
    }

    public function testCanGetPersonSupportRoles()
    {
        $request = $this->mockConnector->disableCaching()->persons($this->personId)
            ->supportRoles()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'support-roles');
    }

    public function testCanGetPersonLookup()
    {
        $request = $this->mockConnector->disableCaching()->persons()
            ->lookup()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lookup');
    }

    public function testCanGetPersonMerged()
    {
        $request = $this->mockConnector->disableCaching()->persons()
            ->merged()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'merged');
    }

    public function testCanGetPersonPayers()
    {
        $request = $this->mockConnector->disableCaching()->persons()
            ->payers()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'payers');
    }
}
