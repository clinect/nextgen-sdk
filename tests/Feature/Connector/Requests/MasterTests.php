<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Master as MasterStub;

class MasterTests extends TestCase
{
    use MasterStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanGetAlertMessages()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->alertMessages()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        $this->assertNotEmpty($response->json()['items']);
    }

    public function testCanGetAlertTypes()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->alertTypes()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        $this->assertNotEmpty($response->json()['items']);
    }

    public function testCanGetAllergies()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->allergies()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetAllergyReactions()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->allergyReactions()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetAppointmentsCategories()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->appointments()->categories()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetAppointmentsCategory()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->appointments()->categories($this->categoryId)
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json()['id'], $this->categoryId);
    }

    public function testCanGetAppointmentsCategoryEvents()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->appointments()->categories($this->categoryId)->events()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetAppointmentsClasses()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->appointments()->classes()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetAppointmentsClassResources()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->appointments()->classes($this->classId)->resources()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json()['items'] as $data) {
            $this->assertSame($data['classId'], $this->classId);
        }
    }

    public function testCanGetBulkOrderTests()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->bulkOrderTests()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetBulkOrderTestDiagnoses()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->bulkOrderTests(1)->diagnoses()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'bulk order test 1');
    }

    public function testCanGetCodes()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->codes()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetCode()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->codes($this->codeId)
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json()['items'] as $data) {
            $this->assertSame($data['codeType'], $this->codeId);
        }
    }

    public function testCanGetCodeIcd10()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->codes()->icd10(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'icd 9 icd 10');
    }

    public function testCanGetCustomDosageAdminOptions()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->customDosageAdminOptions()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetCustomeDosageIntervalUnits()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->customDosageIntervalUnits()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetCustomDosageQuantityUnits()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->customDosageQuantityUnits()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetCustomDosageRouteOptions()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->customDosageRouteOptions()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetCustomPickListItems()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->customPicklistItems()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetCustomPickList()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->customPicklist()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetDiagnoses()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->diagnoses()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetDiagnosesSearch()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->diagnoses()->search(['searchText' => "ventilation"]);

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json() as $data) {
            $this->assertTrue(str_contains($data['clinicalDescription'], "ventilation") ||
            str_contains($data['billingDescription'], "ventilation"));
        }
    }

    public function testCanGetDiagnosisCategories()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->diagnosisCategories()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetDiagnosisSeverities()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->diagnosisSeverities()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetDiagnosisStatuses()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->diagnosisStatuses()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetDiagnosticTests()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->diagnosticTests()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetDocumentFields()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->documentFields()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetDocumentFieldPickListItems()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->documentFields($this->documentFields)->picklistItems()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetDocumentTypes()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->documentTypes()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetDocumentTypeFields()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->documentTypes($this->documentType)->fields()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json()['items'] as $data) {
            $this->assertSame($data['documentTypeId'], $this->documentType);
        }
    }

    public function testCanGetEnterprises()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->enterprises()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetEnterprise()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->enterprises($this->enterpriseId)->options()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($this->enterpriseId, $response->json()['enterpriseId']);
    }

    public function testCanGetEvents()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->events()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetEventCategories()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->events(1)->categories()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'event categories');
    }

    public function testCanGetEventLocations()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->events(1)->locations()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'event locations');
    }

    public function testCanGetEventResourceLimits()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->events(1)->resourceLimits()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'event resource-limits');
    }

    public function testCanGetEventResourceOverrides()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->events(1)->resourceOverrides()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'event resource-overrides');
    }

    public function testCanGetEventResources()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->events(1)->resources()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'event resources');
    }

    public function testCanGetExternalOrganizations()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->externalOrganizations()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetExternalSystems()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->externalSystems()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetImmunizationFundingSources()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->immunizationFundingSources()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetLabTests()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->labTests()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetLabTestComponents()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->labTests(1)->components()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab tests components');
    }

    public function testCanGetLabTestOrderEntryQuestions()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->labTests(1)->orderEntryQuestions()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab tests order-entry-questions');
    }

    public function testCanGetListItems()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->listItems()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetLocations()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->locations()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetLocationsDefault()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->locationsDefault()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetMedications()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->medications()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetMedication()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->medications($this->medicationId)
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($this->medicationId, (string) $response->json()['medicationId']);
    }

    public function testCanGetMedicationDosageOrders()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->medications($this->medicationId)->dosageOrders()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication dosage orders');
    }

    public function testCanGetMedicationFdbDosageOrders()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->medications($this->medicationId)->fdbDosageOrders()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication fdb orders');
    }

    public function testCanGetMedicationRelated()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->medications($this->medicationId)->related()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json() as $data) {
            $this->assertSame($this->medicationId, (string)$data['medicationId']);
        }
    }

    public function testCanGetMedicationsDefault()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->medications()->defaults()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetMedicationsDosageReasonOptions()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->medications()->dosageReasonOptions()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetMedicationsRefillDenialReasons()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->medications()->refillDenialReasons()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetMedicationsRxchangeDenialReasons()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->medications()->rxchangeDenialReasons()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetModifiers()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->modifiers()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetMyLists()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->myLists()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'my-lists');
    }

    public function testCanGetMyList()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->myLists(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'my-lists 1');
    }

    public function testCanGetOrderableVaccines()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->orderableVaccines()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPatientStatuses()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->patientStatuses()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPayers()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->payers()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPayerCopays()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->payers($this->payerId)->copays()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPayerCopaysSpecialties()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->payers($this->payerId)->copays($this->copayId)->specialties()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPaymentReasons()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->paymentReasons()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPharmacies()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->pharmacies()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPharmacy()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->pharmacies($this->pharmacyId)
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($this->pharmacyId, (string) $response->json()["pharmacyId"]);
    }

    public function testCanGetPractices()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->practices()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPracticeDiagnosticTests()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->practices($this->practiceId)->diagnosticTests()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPracticeLabTests()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->practices($this->practiceId)->labTests()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPracticeLocations()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->practices($this->practiceId)->locations()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json()['items'] as $data) {
            $this->assertSame($data['practiceId'], $this->practiceId);
        }
    }

    public function testCanGetPracticeOptions()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->practices($this->practiceId)->options()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($this->practiceId, $response->json()['practiceId']);
    }

    public function testCanGetPracticePayers()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->practices($this->practiceId)->payers()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json()['items'] as $data) {
            $this->assertSame($data['practiceId'], $this->practiceId);
        }
    }

    public function testCanGetPractitioners()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->practitioners()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetProblemsSearch()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->problemsSearch(["keyword" => "problem"]);

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'problem search');
    }

    public function testCanGetProcedureGroups()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->procedureGroups()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetProcedures()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->procedures()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetProviderTaxonomies()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->providerTaxonomies()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetRecallPlans()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->recallPlans()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetSpecialties()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->specialties()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetSpecialtyDiagnosticTests()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->specialties($this->specialtiesId)->diagnosticTests()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetSpecialtyLabTests()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->specialties($this->specialtiesId)->labTests()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetSystemOptions()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->systemOptions()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetTasksCategories()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->tasks()->categories()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetTasksPriorities()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->tasks()->priorities()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetTasksWorkGroups()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->tasks()->workGroups()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetTasksWorkGroupMyLists()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->tasks()->workGroups(1)->myLists()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'workgroup my-lists');
    }

    public function testCanGetTasksWorkGroupUsers()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->tasks()->workGroups(1)->workgroupUsers()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'workgroup users');
    }

    public function testCanGetTimeZones()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->timeZones()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetTransactionCodes()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->transactionCodes()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetUserGroups()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->userGroups()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetVaccineInventories()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->vaccineInventory()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetVaccineInventory()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->vaccineInventory($this->vaccineInventoryId)
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame((string)$response->json()['vaccineInventoryId'], $this->vaccineInventoryId);
    }

    public function testCanGetVaccineManufacturers()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->vaccineManufacturers()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetVaccineSchedules()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->vaccineSchedules()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetVaccines()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->vaccines()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'vaccines');
    }

    public function testCanGetVaccineRelated()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->vaccines(1)->related()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'vaccine related');
    }

    public function testCanGetVaccineAllVis()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->vaccines(1)->vis()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'vaccine vis');
    }

    public function testCanGetVaccineVis()
    {
        $request = $this->mockConnector->disableCaching()->master()
            ->vaccines(1)->vis(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'vaccines 1 vis 1');
    }

    public function testCanGetVfcCodes()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->vfcCodes()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetViewCategories()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->viewCategories()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetViewCategoryItemsExternalTypes()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->viewCategories($this->viewCategoryId)->itemsExternal()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetViewCategoryItemsTypes()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->viewCategories($this->viewCategoryId)->itemsTypes()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetZipCodes()
    {
        $request = $this->apiConnector->disableCaching()->master()
            ->zipCodes()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }
}
