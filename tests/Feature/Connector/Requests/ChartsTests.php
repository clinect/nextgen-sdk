<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\PersonChart as PersonChartStub;

class ChartsTests extends TestCase
{
    use PersonChartStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient($this->personId));
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient($this->personId));
    }

    public function testCanGetChart()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());

        foreach ($response->json() as $data) {
            $this->assertSame($data['personId'], $this->personId);
        }
    }

    public function testCanGetChartAlerts()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->alerts()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartAlert()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->alerts(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'alert 1');
    }

    public function testCanGetChartAllergies()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->allergies()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartAllergy()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->allergies(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'allergy 1');
    }

    public function testCanGetChartAllergyDurCheck()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->allergies(1)->durCheck()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'dur-check 1');
    }

    public function testCanGetChartAssessments()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->assessments()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartBalances()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->balances()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json() as $data) {
            $this->assertSame($data['guarantorId'], $this->personId);
        }
    }

    public function testCanGetChartBalance()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->balances($this->personId)
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json() as $data) {
            $this->assertSame($data['patientName'], $this->patientName);
        }
    }

    public function testCanGetChartCarePlanAssessments()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->carePlanAssessments()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartCarePlanGoals()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->carePlan()->goals()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartCarePlanHealthConcerns()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->carePlan()->healthConcerns()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartCareTeamMembers()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->careTeamMembers()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartCharges()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->charges()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartClinicalNotes()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->clinicalNotes()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartDeletedAllergies()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->deletedAllergies()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartDeletedDiagnoses()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->deletedDiagnoses()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartDiagnoses()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->diagnoses()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetChartSpecificDiagnoses()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->diagnoses(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'diagnoses 1');
    }

    public function testCanGetChartDiagnosesInteractions()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->diagnoses()->interactions()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetChartDiagnosticOrders()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->diagnostic()->orders()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetChartDiagnosticOrder()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->diagnostic()->orders(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetChartDiagnosticOrderInsurances()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->diagnostic()->orders(1)->insurances()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'diagnostic orders insurances 1');
    }

    public function testCanGetChartDiagnosticOrderTests()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->diagnostic()->orders(1)->tests()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'diagnostic orders tests 1');
    }

    public function testCanGetChartDiagnosticOrderTest()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->diagnostic()->orders(1)->tests(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'diagnostic orders test 1');
    }

    public function testCanGetChartDiagnosticOrderSuspectedDiagnoses()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->diagnostic()->orders(1)->tests(1)->suspectedDiagnoses()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'diagnostic orders test suspected diagnoses 1');
    }

    public function testCanGetChartDocuments()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->documents()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json()['items'] as $data) {
            $this->assertSame($data['personId'], $this->personId);
        }
    }

    public function testCanGetChartDocument()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->documents($this->documentId)
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json()['id'], $this->documentId);
        $this->assertSame($response->json()['personId'], $this->personId);
    }

    public function testCanGetChartDocumentPage()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->documents($this->documentId)->page(1)
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetChartDocumentPdf()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->documents($this->documentId)->pdf()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetChartDocumentPlainText()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->documents($this->documentId)->plainText()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'document plain text 1');
    }

    public function testCanGetChartDocumentThumbnail()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->documents($this->documentId)->thumbnail(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'document thumbnail 1');
    }

    public function testCanGetChartDocumentXml()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->documents($this->documentId)->xml()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'document xml 1');
    }

    public function testCanGetChartEncounters()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json()['items'] as $data) {
            $this->assertSame($data['personId'], $this->personId);
        }
    }

    public function testCanGetChartEncounter()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json()['id'], $this->encounterId);
        $this->assertSame($response->json()['personId'], $this->personId);
    }

    public function testCanGetChartEncounterAllergies()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->allergies()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter allergies 1');
    }

    public function testCanGetChartEncounterAllergy()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->allergies(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter allergy 1');
    }

    public function testCanGetChartEncounterAllergyReaction()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->allergies(1)->reactions()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter allergy reactions 1');
    }

    public function testCanGetChartEncounterCarePlan()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->carePlan()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter care plan 1');
    }

    public function testCanGetChartEncounterCarePlanHealthConcerns()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->carePlan()->healthConcerns(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter care plan health concerns 1');
    }

    public function testCanGetChartEncounterCarePlanHealthConcernsGoals()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->carePlan()->healthConcerns(1)->goals()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter care plan health concerns goals 1');
    }

    public function testCanGetChartEncounterCarePlanHealthConcernsGoal()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->carePlan()->healthConcerns(1)->goals(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter care plan health concerns goal 1');
    }

    public function testCanGetChartEncounterCarePlanHealthConcernsGoalInterventions()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->carePlan()->healthConcerns(1)->goals(1)->interventions()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter care plan health concerns goal interventions 1');
    }

    public function testCanGetChartEncounterCarePlanHealthConcernsGoalIntervention()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->carePlan()->healthConcerns(1)->goals(1)->interventions(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter care plan health concerns goal intervention 1');
    }

    public function testCanGetChartEncounterCarePlanHealthConcernsGoalInterventionOutcomes()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->carePlan()->healthConcerns(1)->goals(1)->interventions(1)->outcomes()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter care plan health concerns goal intervention outcomes 1');
    }

    public function testCanGetChartEncounterCarePlanHealthConcernsGoalInterventionOutcome()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->carePlan()->healthConcerns(1)->goals(1)->interventions(1)->outcomes(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter care plan health concerns goal intervention outcome 1');
    }

    public function testCanGetChartEncounterClinicalNotes()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->clinicalNotes()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartEncounterAllDiagnoses()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->diagnoses()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetChartEncounterDiagnoses()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->diagnoses(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter diagnoses 1');
    }

    public function testCanGetChartEncounterDiagnosesAssessments()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->diagnoses(1)->assessments()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter diagnoses assessments 1');
    }

    public function testCanGetChartEncounterDiagnosesInteractions()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->diagnoses(1)->interactions()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter diagnoses interactions 1');
    }

    public function testCanGetChartEncounterFormsPrapare()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->forms()->prapare()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter forms prapare 1');
    }

    public function testCanGetChartEncounterMedications()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->medications()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartEncounterMedication()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->medications(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter medication 1');
    }

    public function testCanGetChartEncounterObstetricsRiskFactors()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->obstetrics()->riskFactors()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter obstetrics risk factors 1');
    }

    public function testCanGetChartEncounterPostPartumCheck()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->postpartumCheck(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter post partum check 1');
    }

    public function testCanGetChartEncounterPostPartumVisit()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->postpartumVisit()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter post partum visit');
    }

    public function testCanGetChartEncounterPregnanciesGravidityParity()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->pregnancies()->gravidityParity()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter pregnancies gravidity parity');
    }

    public function testCanGetChartEncounterProcedure()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->procedures(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter procedure 1');
    }

    public function testCanGetChartEncounterReasonsForVisit()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->reasonsForVisit()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter reasons for visit');
    }

    public function testCanGetChartEncounterReferralOrders()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->referralOrders()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartEncounterROSCardiovascular()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->reviewOfSystems()->cardiovascular()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter ROS cardiovascular');
    }

    public function testCanGetChartEncounterROSConstitutional()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->reviewOfSystems()->constitutional()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter ROS constitutional');
    }

    public function testCanGetChartEncounterROSEnmt()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->reviewOfSystems()->enmt()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter ROS enmt');
    }

    public function testCanGetChartEncounterROSGastrointestinal()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->reviewOfSystems()->gastrointestinal()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter ROS gastrointestinal');
    }

    public function testCanGetChartEncounterROSGenitourinary()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->reviewOfSystems()->genitourinary()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter ROS genitourinary');
    }

    public function testCanGetChartEncounterROSImmunologic()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->reviewOfSystems()->immunologic()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter ROS immunologic');
    }

    public function testCanGetChartEncounterROSMusculoskeletal()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->reviewOfSystems()->musculoskeletal()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter ROS musculoskeletal');
    }

    public function testCanGetChartEncounterROSRespiratory()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->reviewOfSystems()->respiratory()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter ROS respiratory');
    }

    public function testCanGetChartEncounterScreeningToolsGeneric()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->screeningTools()->generic(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter screening tools generic');
    }

    public function testCanGetChartEncounterScreeningToolsPhq2()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->screeningTools()->phq2(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter screening tools phq2');
    }

    public function testCanGetChartEncounterScreeningToolsPhq9()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->screeningTools()->phq9(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter screening tools phq9');
    }

    public function testCanGetChartEncounterTelephoneCalls()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->telephoneCalls()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetChartEncounterTelephoneCommunications()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->telephoneCommunications()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartEncounterVitals()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()->encounters($this->encounterId)
            ->vitals(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter vitals 1');
    }

    public function testCanGetChartFamilyHistory()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->familyHistory()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'encounter family history');
    }

    public function testCanGetChartFamilyInfo()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->familyInfo()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());

        foreach ($response->json() as $data) {
            $this->assertSame($data['personId'], $this->personId);
        }
    }

    public function testCanGetChartFormsPrapare()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->forms()->prapare()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetChartHealthConcernsAllergies()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->healthConcerns()->allergies()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartHealthConcernsAssessmentScales()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->healthConcerns()->assessmentScales()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartHealthConcernsEncoutnerDiagnoses()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->healthConcerns()->encounterDiagnosis()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartHealthConcernsFamilyHistoriesOrganizer()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->healthConcerns()->familyHistoriesOrganizer()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartHealthConcernsProblemObservations()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->healthConcerns()->problemObservations()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartHealthConcernsSocialHistory()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->healthConcerns()->socialHistory()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartHealthConcernsTobacco()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->healthConcerns()->tobaccoSmokingUsageStatus()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartHealthConcernsVitals()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->healthConcerns()->vitals()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartImmunizations()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartImmunizationsDoseValidation()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->doseValidation()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetChartImmunizationsExclusions()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->exclusions()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartImmunizationsGroupStatus()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->groupStatus()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json() as $data) {
            if ($data['statusCalculationCode'] != "EVAL_OLD_LOGIC") {
                $this->assertSame($data['personId'], $this->personId);
            }
        }
    }

    public function testCanGetChartImmunizationsInteractions()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->interactions()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations interactions');
    }

    public function testCanGetChartImmunizationsOrders()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->orders()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartImmunizationsOrder()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->orders(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations order 1');
    }

    public function testCanGetChartImmunizationsOrderInsurances()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->orders(1)->insurances()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations order insurances 1');
    }

    public function testCanGetChartImmunizationsOrderTrackingComments()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->orders(1)->trackingComments()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations order tracking-comments 1');
    }

    public function testCanGetChartImmunizationsOrderVaccines()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->orders(1)->vaccines()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations order vaccines 1');
    }

    public function testCanGetChartImmunizationsOrderVaccine()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->orders(1)->vaccines(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations order vaccine 1');
    }

    public function testCanGetChartImmunizationsOrderVaccineComponentLotNumber()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->orders(1)->vaccines(1)->componentLotNumbers()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations order vaccine component-lot-numbers 1');
    }

    public function testCanGetChartImmunizationsOrderVaccineSuspectedDiagnoses()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->orders(1)->vaccines(1)->suspectedDiagnoses()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations order vaccine suspected-diagnoses 1');
    }

    public function testCanGetChartImmunizationsOrderVaccinesVisHistory()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->orders(1)->vaccines(1)->visHistories()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations order vaccine vis-histories 1');
    }

    public function testCanGetChartImmunizationsOrderVaccinesWastedVaccines()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->orders(1)->vaccines(1)->wastedVaccines()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations order vaccine wasted-vaccines 1');
    }

    public function testCanGetChartImmunizationsOrderVaccinesWastedVaccine()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->orders(1)->vaccines(1)->wastedVaccines(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations order vaccine wasted-vaccine 1');
    }

    public function testCanGetChartImmunizationsSeriesCompletions()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->seriesCompletions()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetChartImmunizationsSeriesCompletion()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->immunizations()->seriesCompletions(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations series completions 1');
    }

    public function testCanGetChartLabOrders()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->orders()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartLabOrder()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->orders(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab order 1');
    }

    public function testCanGetChartLabOrderInsurances()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->orders(1)->insurances()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab order insurances 1');
    }

    public function testCanGetChartLabOrderSchedule()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->orders(1)->schedule()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab order schedule 1');
    }

    public function testCanGetChartLabOrderTests()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->orders(1)->tests()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab order schedule tests');
    }

    public function testCanGetChartLabOrderTest()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->orders(1)->tests(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab order schedule test 1');
    }

    public function testCanGetChartLabOrderTestOrderEntryAnswers()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->orders(1)->tests(1)->orderEntryAnswers()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab order test order-entry-answers 1');
    }

    public function testCanGetChartLabOrderTestSuspectedDiagnoses()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->orders(1)->tests(1)->suspectedDiagnoses()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab order test suspected-diagnoses 1');
    }

    public function testCanGetChartLabOrderTrackingComments()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->orders(1)->trackingComments()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab order tracking-comments 1');
    }

    public function testCanGetChartLabPanels()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->panels()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartLabPanel()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->panels(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab panel 1');
    }

    public function testCanGetChartLabPanelResults()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->panels(1)->results()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lab panel results 1');
    }

    public function testCanGetChartLabResults()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->lab()->results()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartMedicalHistories()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medicalHistory()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medical-histories');
    }

    public function testCanGetChartMedicalHistory()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medicalHistory(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medical-history 1');
    }

    public function testCanGetChartMedicationRenewealRequestMedications()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medicationRenewalRequests(1)->medications()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication-renewal-requests medications');
    }

    public function testCanGetChartMedications()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medications()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartMedication()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medications(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication 1');
    }

    public function testCanGetChartMedicationDosageRange()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medications(1)->dosageRange()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication dosage-range');
    }

    public function testCanGetChartMedicationDosageOrders()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medications(1)->dosageOrders()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication dosage-orders');
    }

    public function testCanGetChartMedicationNotes()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medications(1)->notes()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication notes');
    }

    public function testCanGetChartMedicationNote()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medications(1)->notes(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication note 1');
    }

    public function testCanGetChartMedicationDurCheck()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medications(1)->durCheck()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication note dur-check');
    }

    public function testCanGetChartMedicationMonographData()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medications(1)->monographData()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication note monograph-data');
    }

    public function testCanGetChartMedicationPatientEducation()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medications(1)->patientEducation()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication note patient-education');
    }

    public function testCanGetChartMedicationPdmpReport()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->medications()->pdmpReport()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medication pdmp report');
    }

    public function testCanGetChartObstetricsEncounterOBFlowSheet()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->encounters($this->encounterId)->obFlowSheets(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'obstetrics encounters obflowsheets');
    }

    public function testCanGetChartObstetricsEncounterOBInitialPhysicalExam()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->encounters($this->encounterId)->obInitialPhysicalExam()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'obstetrics encounters ob-initial-physical-exams');
    }

    public function testCanGetChartObstetricsEncounterOBMultiGestation()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->encounters($this->encounterId)->obMultiGestation()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'obstetrics encounters ob-multi-gestation');
    }

    public function testCanGetChartObstetricsEncounterPAPDetails()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->encounters($this->encounterId)->papDetails()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'obstetrics encounters pap-details');
    }

    public function testCanGetChartObstetricsEncounterSTIScreening()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->encounters($this->encounterId)->stiScreening()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'obstetrics encounters sti-screening');
    }

    public function testCanGetChartObstetricsOBFlowSheets()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->obFlowsheets()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartObstetricsOBInitialPhysicalExams()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->obInitialPhysicalExams()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartObstetricsOBMultiGestation()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->obMultiGestation()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartObstetricsPAPDetails()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->papDetails()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartObstetricsPregnancies()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->pregnancies()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartObstetricsProblems()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->problems()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartObstetricsProblem()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->problems(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'obstetrics problem 1');
    }

    public function testCanGetChartObstetricsRiskFactors()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->riskFactors()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartObstetricSTIScreening()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->obstetrics()->stiScreening()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartOrdersPanels()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->orders()->panels()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartOrdersPanel()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->orders()->panels(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'orders panel 1');
    }

    public function testCanGetChartOrdersPanelResults()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->orders()->panels(1)->results()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'orders panel results 1');
    }

    public function testCanGetChartOrdersResults()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->orders()->results()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartPharmacies()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->pharmacies()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetChartPostPartumCheck()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->postpartumCheck()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartPostPartumVisits()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->postpartumVisits()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartPregnanciesEncounterGestationalAge()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->pregnancies()->encounters($this->encounterId)->gestationalAge()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'pregnancies encounters gestational age');
    }

    public function testCanGetChartPregnanciesGestationalAge()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->pregnancies()->gestationalAge()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartPregnanciesOutcomes()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->pregnancies()->outcomes()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartPregnanciesOutcome()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->pregnancies()->outcomes(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'pregnancies outcome 1');
    }

    public function testCanGetChartProblems()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->problems()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartProblem()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->problems(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'problem 1');
    }

    public function testCanGetChartProblemInteractions()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->problems(1)->interactions()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'problem interactions 1');
    }

    public function testCanGetChartProblemNotes()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->problems(1)->notes()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'problem notes 1');
    }

    public function testCanGetChartProblemNote()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->problems(1)->notes(1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'problem note 1');
    }

    public function testCanGetChartProblemsInteractions()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->problems()->interactions()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'problems interactions');
    }

    public function testCanGetChartProcedures()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->procedures()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartRecallPlans()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->recallPlans()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartRecallPlan()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->recallPlans(1, 1)
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'recall plans page');
    }

    public function testCanGetChartReviewOfSystems()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->reviewOfSystems()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'review-of-systems');
    }

    public function testCanGetChartSocialHistory()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->socialHistory()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartSocialHistoryAlcoholCaffeine()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->socialHistory()->alcoholAndCaffeine()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'social history alcohol-and-caffeine');
    }

    public function testCanGetChartSocialHistoryAlcoholDrug()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->socialHistory()->alcoholAndDrugUsage()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'social history alcohol-and-drug-usage');
    }

    public function testCanGetChartSocialHistoryComments()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->socialHistory()->comments()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'social history comments');
    }

    public function testCanGetChartSocialHistoryDiet()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->socialHistory()->diet()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'social history diet');
    }

    public function testCanGetChartSocialHistoryEmployments()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->socialHistory()->employments()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'social history employments');
    }

    public function testCanGetChartSocialHistoryLifeStyle()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->socialHistory()->lifestyle()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'social history lifestyle');
    }

    public function testCanGetChartSocialHistoryStatuses()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->socialHistory()->statuses()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'social history statuses');
    }

    public function testCanGetChartSocialHistoryTobacco()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->socialHistory()->tobaccoUsage()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'social history tobacco-usage');
    }

    public function testCanGetChartSocialHistoryVaping()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->socialHistory()->vaping()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'social history vaping');
    }

    public function testCanGetChartSupportRoles()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->supportRoles()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetChartTelephoneCalls()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->telephoneCalls()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetChartTobaccoUsage()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->tobaccoUsage()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'tobacco-usage');
    }

    public function testCanGetChartTodayEncounter()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->todayEncounter()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'today-encounter');
    }

    public function testCanGetChartVitals()
    {
        $request = $this->apiConnector->disableCaching()
            ->persons($this->personId)->chart()
            ->vitals()
            ->get();

        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }

    public function testCanGetPersonsChartImmunizations()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons()->chart()
            ->immunizations()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'immunizations');
    }

    public function testCanGetPersonsChartMedications()
    {
        $request = $this->mockConnector->disableCaching()
            ->persons()->chart()
            ->medications()
            ->get();

        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'medications');
    }
}
