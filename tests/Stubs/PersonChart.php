<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait PersonChart
{
    private $apiConnector;
    private $mockConnector;
    private $personId = "1c5d22d3-cc33-4082-98ad-7a58c637f646";
    private $patientName = "Patient, QA";
    private $documentId = "32c44bd8-b10d-4017-87dd-09270874d467";
    private $encounterId = "82fb98c5-a588-4498-8b23-62b6b0700db3";

    protected function mockClient($personId = 1): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/persons/{$personId}/chart/alerts/1" => MockResponse::make([
                    'name' => 'alert 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/allergies/1" => MockResponse::make([
                    'name' => 'allergy 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/allergies/1/dur-check" => MockResponse::make([
                    'name' => 'dur-check 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/diagnoses/1" => MockResponse::make([
                    'name' => 'diagnoses 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/diagnoses/interactions" => MockResponse::make([
                    'name' => 'diagnoses 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/diagnostic/orders/1" => MockResponse::make([
                    'name' => 'diagnostic orders 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/diagnostic/orders/1/insurances" => MockResponse::make([
                    'name' => 'diagnostic orders insurances 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/diagnostic/orders/1/tests" => MockResponse::make([
                    'name' => 'diagnostic orders tests 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/diagnostic/orders/1/tests/1" => MockResponse::make([
                    'name' => 'diagnostic orders test 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/diagnostic/orders/1/tests/1/suspected-diagnoses" => MockResponse::make([
                    'name' => 'diagnostic orders test suspected diagnoses 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/documents/{$this->documentId}/plain-text" => MockResponse::make([
                    'name' => 'document plain text 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/documents/{$this->documentId}/thumbnail/1" => MockResponse::make([
                    'name' => 'document thumbnail 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/documents/{$this->documentId}/xml" => MockResponse::make([
                    'name' => 'document xml 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/allergies" => MockResponse::make([
                    'name' => 'encounter allergies 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/allergies/1" => MockResponse::make([
                    'name' => 'encounter allergy 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/allergies/1/reactions" => MockResponse::make([
                    'name' => 'encounter allergy reactions 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/care-plan" => MockResponse::make([
                    'name' => 'encounter care plan 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/care-plan/health-concerns/1" => MockResponse::make([
                    'name' => 'encounter care plan health concerns 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/care-plan/health-concerns/1/goals" => MockResponse::make([
                    'name' => 'encounter care plan health concerns goals 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/care-plan/health-concerns/1/goals/1" => MockResponse::make([
                    'name' => 'encounter care plan health concerns goal 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/care-plan/health-concerns/1/goals/1/interventions" => MockResponse::make([
                    'name' => 'encounter care plan health concerns goal interventions 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/care-plan/health-concerns/1/goals/1/interventions/1" => MockResponse::make([
                    'name' => 'encounter care plan health concerns goal intervention 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/care-plan/health-concerns/1/goals/1/interventions/1/outcomes" => MockResponse::make([
                    'name' => 'encounter care plan health concerns goal intervention outcomes 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/care-plan/health-concerns/1/goals/1/interventions/1/outcomes/1" => MockResponse::make([
                    'name' => 'encounter care plan health concerns goal intervention outcome 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/diagnoses/1" => MockResponse::make([
                    'name' => 'encounter diagnoses 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/diagnoses/1/assessments" => MockResponse::make([
                    'name' => 'encounter diagnoses assessments 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/diagnoses/1/interactions" => MockResponse::make([
                    'name' => 'encounter diagnoses interactions 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/forms/prapare" => MockResponse::make([
                    'name' => 'encounter forms prapare 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/medications/1" => MockResponse::make([
                    'name' => 'encounter medication 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/obstetrics/risk-factors" => MockResponse::make([
                    'name' => 'encounter obstetrics risk factors 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/postpartum-check/1" => MockResponse::make([
                    'name' => 'encounter post partum check 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/postpartum-visit" => MockResponse::make([
                    'name' => 'encounter post partum visit'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/pregnancies/gravidity-parity" => MockResponse::make([
                    'name' => 'encounter pregnancies gravidity parity'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/procedures/1" => MockResponse::make([
                    'name' => 'encounter procedure 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/reasons-for-visit" => MockResponse::make([
                    'name' => 'encounter reasons for visit'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/review-of-systems/cardiovascular" => MockResponse::make([
                    'name' => 'encounter ROS cardiovascular'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/review-of-systems/constitutional" => MockResponse::make([
                    'name' => 'encounter ROS constitutional'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/review-of-systems/enmt" => MockResponse::make([
                    'name' => 'encounter ROS enmt'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/review-of-systems/gastrointestinal" => MockResponse::make([
                    'name' => 'encounter ROS gastrointestinal'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/review-of-systems/genitourinary" => MockResponse::make([
                    'name' => 'encounter ROS genitourinary'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/review-of-systems/immunologic" => MockResponse::make([
                    'name' => 'encounter ROS immunologic'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/review-of-systems/musculoskeletal" => MockResponse::make([
                    'name' => 'encounter ROS musculoskeletal'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/review-of-systems/respiratory" => MockResponse::make([
                    'name' => 'encounter ROS respiratory'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/screening-tools/generic/1" => MockResponse::make([
                    'name' => 'encounter screening tools generic'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/screening-tools/phq2/1" => MockResponse::make([
                    'name' => 'encounter screening tools phq2'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/screening-tools/phq9/1" => MockResponse::make([
                    'name' => 'encounter screening tools phq9'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/encounters/{$this->encounterId}/vitals/1" => MockResponse::make([
                    'name' => 'encounter vitals 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/family-history" => MockResponse::make([
                    'name' => 'encounter family history'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/interactions" => MockResponse::make([
                    'name' => 'immunizations interactions'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/orders/1" => MockResponse::make([
                    'name' => 'immunizations order 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/orders/1/insurances" => MockResponse::make([
                    'name' => 'immunizations order insurances 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/orders/1/tracking-comments" => MockResponse::make([
                    'name' => 'immunizations order tracking-comments 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/orders/1/vaccines" => MockResponse::make([
                    'name' => 'immunizations order vaccines 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1" => MockResponse::make([
                    'name' => 'immunizations order vaccine 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1/component-lot-numbers" => MockResponse::make([
                    'name' => 'immunizations order vaccine component-lot-numbers 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1/suspected-diagnoses" => MockResponse::make([
                    'name' => 'immunizations order vaccine suspected-diagnoses 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1/vis-histories" => MockResponse::make([
                    'name' => 'immunizations order vaccine vis-histories 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1/wasted-vaccines" => MockResponse::make([
                    'name' => 'immunizations order vaccine wasted-vaccines 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1/wasted-vaccines/1" => MockResponse::make([
                    'name' => 'immunizations order vaccine wasted-vaccine 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/immunizations/series-completions/1" => MockResponse::make([
                    'name' => 'immunizations series completions 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/lab/orders/1" => MockResponse::make([
                    'name' => 'lab order 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/lab/orders/1/insurances" => MockResponse::make([
                    'name' => 'lab order insurances 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/lab/orders/1/schedule" => MockResponse::make([
                    'name' => 'lab order schedule 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/lab/orders/1/tests" => MockResponse::make([
                    'name' => 'lab order schedule tests'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/lab/orders/1/tests/1" => MockResponse::make([
                    'name' => 'lab order schedule test 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/lab/orders/1/tests/1/order-entry-answers" => MockResponse::make([
                    'name' => 'lab order test order-entry-answers 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/lab/orders/1/tests/1/suspected-diagnoses" => MockResponse::make([
                    'name' => 'lab order test suspected-diagnoses 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/lab/orders/1/tracking-comments" => MockResponse::make([
                    'name' => 'lab order tracking-comments 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/lab/panels/1" => MockResponse::make([
                    'name' => 'lab panel 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/lab/panels/1/results" => MockResponse::make([
                    'name' => 'lab panel results 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medical-history" => MockResponse::make([
                    'name' => 'medical-histories'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medical-history/1" => MockResponse::make([
                    'name' => 'medical-history 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medication-renewal-requests/1/medications" => MockResponse::make([
                    'name' => 'medication-renewal-requests medications'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medications/1" => MockResponse::make([
                    'name' => 'medication 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medications/1/dosage-range" => MockResponse::make([
                    'name' => 'medication dosage-range'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medications/1/dosage-orders" => MockResponse::make([
                    'name' => 'medication dosage-orders'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medications/1/notes" => MockResponse::make([
                    'name' => 'medication notes'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medications/1/notes/1" => MockResponse::make([
                    'name' => 'medication note 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medications/1/dur-check" => MockResponse::make([
                    'name' => 'medication note dur-check'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medications/1/monograph-data" => MockResponse::make([
                    'name' => 'medication note monograph-data'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medications/1/patient-education" => MockResponse::make([
                    'name' => 'medication note patient-education'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/medications/pdmp-report" => MockResponse::make([
                    'name' => 'medication pdmp report'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/obstetrics/encounters/{$this->encounterId}/ob-flowsheets/1" => MockResponse::make([
                    'name' => 'obstetrics encounters obflowsheets'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/obstetrics/encounters/{$this->encounterId}/ob-initial-physical-exams" => MockResponse::make([
                    'name' => 'obstetrics encounters ob-initial-physical-exams'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/obstetrics/encounters/{$this->encounterId}/ob-multi-gestation" => MockResponse::make([
                    'name' => 'obstetrics encounters ob-multi-gestation'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/obstetrics/encounters/{$this->encounterId}/pap-details" => MockResponse::make([
                    'name' => 'obstetrics encounters pap-details'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/obstetrics/encounters/{$this->encounterId}/sti-screening" => MockResponse::make([
                    'name' => 'obstetrics encounters sti-screening'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/obstetrics/problems/1" => MockResponse::make([
                    'name' => 'obstetrics problem 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/orders/panels/1" => MockResponse::make([
                    'name' => 'orders panel 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/orders/panels/1/results" => MockResponse::make([
                    'name' => 'orders panel results 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/pregnancies/encounters/{$this->encounterId}/gestational-age" => MockResponse::make([
                    'name' => 'pregnancies encounters gestational age'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/pregnancies/outcomes/1" => MockResponse::make([
                    'name' => 'pregnancies outcome 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/problems/1" => MockResponse::make([
                    'name' => 'problem 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/problems/1/interactions" => MockResponse::make([
                    'name' => 'problem interactions 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/problems/1/notes" => MockResponse::make([
                    'name' => 'problem notes 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/problems/1/notes/1" => MockResponse::make([
                    'name' => 'problem note 1'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/problems/interactions" => MockResponse::make([
                    'name' => 'problems interactions'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/recall-plans/1/1" => MockResponse::make([
                    'name' => 'recall plans page'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/review-of-systems" => MockResponse::make([
                    'name' => 'review-of-systems'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/social-history/alcohol-and-caffeine" => MockResponse::make([
                    'name' => 'social history alcohol-and-caffeine'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/social-history/alcohol-and-drug-usage" => MockResponse::make([
                    'name' => 'social history alcohol-and-drug-usage'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/social-history/comments" => MockResponse::make([
                    'name' => 'social history comments'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/social-history/diet" => MockResponse::make([
                    'name' => 'social history diet'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/social-history/employments" => MockResponse::make([
                    'name' => 'social history employments'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/social-history/lifestyle" => MockResponse::make([
                    'name' => 'social history lifestyle'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/social-history/statuses" => MockResponse::make([
                    'name' => 'social history statuses'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/social-history/tobacco-usage" => MockResponse::make([
                    'name' => 'social history tobacco-usage'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/social-history/vaping" => MockResponse::make([
                    'name' => 'social history vaping'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/tobacco-usage" => MockResponse::make([
                    'name' => 'tobacco-usage'
                ], 200),

                "{$this->url()}/persons/{$personId}/chart/today-encounter" => MockResponse::make([
                    'name' => 'today-encounter'
                ], 200),

                "{$this->url()}/persons/chart/immunizations" => MockResponse::make([
                    'name' => 'immunizations'
                ], 200),

                "{$this->url()}/persons/chart/medications" => MockResponse::make([
                    'name' => 'medications'
                ], 200),



                "{$this->url()}/chart/*" => MockResponse::make([
                    'error' => 'No data available'
                ], 404),
            ],
        ];

        return new MockClient($response);
    }

    protected function fixtureClient($personId = 1): MockClient
    {
        $response = [
            ...$this->apiAuthorize(),
            ...[
                "{$this->apiUrl()}/persons/{$personId}/chart" => MockResponse::fixture('PersonChart/chart'),
                "{$this->apiUrl()}/persons/{$personId}/chart/alerts" => MockResponse::fixture('PersonChart/alerts'),
                "{$this->apiUrl()}/persons/{$personId}/chart/alerts/1" => MockResponse::fixture('PersonChart/alert'),
                "{$this->apiUrl()}/persons/{$personId}/chart/allergies" => MockResponse::fixture('PersonChart/Allergies/allergies'),
                "{$this->apiUrl()}/persons/{$personId}/chart/allergies/1" => MockResponse::fixture('PersonChart/Allergies/allergy'),
                "{$this->apiUrl()}/persons/{$personId}/chart/allergies/1/dur-check" => MockResponse::fixture('PersonChart/Allergies/durCheck'),
                "{$this->apiUrl()}/persons/{$personId}/chart/assessments" => MockResponse::fixture('PersonChart/assessments'),
                "{$this->apiUrl()}/persons/{$personId}/chart/balances" => MockResponse::fixture('PersonChart/balances'),
                "{$this->apiUrl()}/persons/{$personId}/chart/balances/{$personId}" => MockResponse::fixture('PersonChart/balance'),
                "{$this->apiUrl()}/persons/{$personId}/chart/care-plan-assessments" => MockResponse::fixture('PersonChart/CarePlan/assessments'),
                "{$this->apiUrl()}/persons/{$personId}/chart/care-plan/goals" => MockResponse::fixture('PersonChart/CarePlan/goals'),
                "{$this->apiUrl()}/persons/{$personId}/chart/care-plan/health-concerns" => MockResponse::fixture('PersonChart/CarePlan/healthConcerns'),
                "{$this->apiUrl()}/persons/{$personId}/chart/care-team-members" => MockResponse::fixture('PersonChart/careTeamMembers'),
                "{$this->apiUrl()}/persons/{$personId}/chart/charges" => MockResponse::fixture('PersonChart/charges'),
                "{$this->apiUrl()}/persons/{$personId}/chart/clinical-notes" => MockResponse::fixture('PersonChart/clinicalNotes'),
                "{$this->apiUrl()}/persons/{$personId}/chart/deleted-allergies" => MockResponse::fixture('PersonChart/deletedAllergies'),
                "{$this->apiUrl()}/persons/{$personId}/chart/deleted-diagnoses" => MockResponse::fixture('PersonChart/deletedDiagnoses'),
                "{$this->apiUrl()}/persons/{$personId}/chart/devices" => MockResponse::fixture('PersonChart/devices'),
                "{$this->apiUrl()}/persons/{$personId}/chart/devices/1" => MockResponse::fixture('PersonChart/device'),
                "{$this->apiUrl()}/persons/{$personId}/chart/diagnoses" => MockResponse::fixture('PersonChart/Diagnoses/allDiagnoses'),
                "{$this->apiUrl()}/persons/{$personId}/chart/diagnoses/1" => MockResponse::fixture('PersonChart/Diagnoses/diagnoses'),
                "{$this->apiUrl()}/persons/{$personId}/chart/diagnoses/interactions" => MockResponse::fixture('PersonChart/Diagnoses/interactions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/diagnostic/orders" => MockResponse::fixture('PersonChart/DiagnosticOrders/orders'),
                "{$this->apiUrl()}/persons/{$personId}/chart/diagnostic/orders/1" => MockResponse::fixture('PersonChart/DiagnosticOrders/order'),
                "{$this->apiUrl()}/persons/{$personId}/chart/diagnostic/orders/1/insurances" => MockResponse::fixture('PersonChart/DiagnosticOrders/insurances'),
                "{$this->apiUrl()}/persons/{$personId}/chart/diagnostic/orders/1/tests" => MockResponse::fixture('PersonChart/DiagnosticOrders/tests'),
                "{$this->apiUrl()}/persons/{$personId}/chart/diagnostic/orders/1/tests/1" => MockResponse::fixture('PersonChart/DiagnosticOrders/test'),
                "{$this->apiUrl()}/persons/{$personId}/chart/diagnostic/orders/1/tests/1/suspected-diagnoses" => MockResponse::fixture('PersonChart/DiagnosticOrders/suspectedDiagnoses'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents" => MockResponse::fixture('PersonChart/Documents/documents'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/32c44bd8-b10d-4017-87dd-09270874d467" => MockResponse::fixture('PersonChart/Documents/document'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/32c44bd8-b10d-4017-87dd-09270874d467/1" => MockResponse::fixture('PersonChart/Documents/documentPage'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/32c44bd8-b10d-4017-87dd-09270874d467/pdf" => MockResponse::fixture('PersonChart/Documents/pdf'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/32c44bd8-b10d-4017-87dd-09270874d467/plain-text" => MockResponse::fixture('PersonChart/Documents/plainText'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/32c44bd8-b10d-4017-87dd-09270874d467/thumbnail/1" => MockResponse::fixture('PersonChart/Documents/thumbnail'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/32c44bd8-b10d-4017-87dd-09270874d467/xml" => MockResponse::fixture('PersonChart/Documents/xml'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters" => MockResponse::fixture('PersonChart/Encounters/encounters'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3" => MockResponse::fixture('PersonChart/Encounters/encounter'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/allergies" => MockResponse::fixture('PersonChart/Encounters/allergies'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/allergies/1" => MockResponse::fixture('PersonChart/Encounters/allergy'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/allergies/1/reactions" => MockResponse::fixture('PersonChart/Encounters/allergiesReactions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/care-plan" => MockResponse::fixture('PersonChart/Encounters/CarePlan/carePlans'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/care-plan/health-concerns/1" => MockResponse::fixture('PersonChart/Encounters/CarePlan/healthConcerns'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/care-plan/health-concerns/1/goals" => MockResponse::fixture('PersonChart/Encounters/CarePlan/goals'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/care-plan/health-concerns/1/goals/1" => MockResponse::fixture('PersonChart/Encounters/CarePlan/goal'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/care-plan/health-concerns/1/goals/1/interventions" => MockResponse::fixture('PersonChart/Encounters/CarePlan/interventions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/care-plan/health-concerns/1/goals/1/interventions/1" => MockResponse::fixture('PersonChart/Encounters/CarePlan/intervention'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/care-plan/health-concerns/1/goals/1/interventions/1/outcomes" => MockResponse::fixture('PersonChart/Encounters/CarePlan/interventionOutcomes'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/care-plan/health-concerns/1/goals/1/interventions/1/outcomes/1" => MockResponse::fixture('PersonChart/Encounters/CarePlan/interventionOutcome'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/clinical-notes" => MockResponse::fixture('PersonChart/Encounters/clinicalNotes'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/diagnoses" => MockResponse::fixture('PersonChart/Encounters/Diagnoses/allDiagnoses'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/diagnoses/1" => MockResponse::fixture('PersonChart/Encounters/Diagnoses/diagnoses'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/diagnoses/1/assessments" => MockResponse::fixture('PersonChart/Encounters/Diagnoses/assessments'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/diagnoses/1/interactions" => MockResponse::fixture('PersonChart/Encounters/Diagnoses/interactions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/forms/prapare" => MockResponse::fixture('PersonChart/Encounters/formsPrapare'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/insurances" => MockResponse::fixture('PersonChart/Encounters/insurances'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/medications" => MockResponse::fixture('PersonChart/Encounters/medications'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/medications/1" => MockResponse::fixture('PersonChart/Encounters/medication'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/obstetrics/risk-factors" => MockResponse::fixture('PersonChart/Encounters/obstetricsRiskFactors'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/postpartum-check/1" => MockResponse::fixture('PersonChart/Encounters/postPartumCheck'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/postpartum-visit" => MockResponse::fixture('PersonChart/Encounters/postPartumVisit'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/pregnancies/gravidity-parity" => MockResponse::fixture('PersonChart/Encounters/pregnanciesGravidityParity'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/procedures/1" => MockResponse::fixture('PersonChart/Encounters/procedures'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/reasons-for-visit" => MockResponse::fixture('PersonChart/Encounters/reasonsForVisit'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/referral-orders" => MockResponse::fixture('PersonChart/Encounters/referralOrders'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/review-of-systems/cardiovascular" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/cardiovascular'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/review-of-systems/constitutional" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/constitutional'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/review-of-systems/enmt" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/enmt'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/review-of-systems/gastrointestinal" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/gastrointestinal'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/review-of-systems/genitourinary" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/genitourinary'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/review-of-systems/immunologic" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/immunologic'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/review-of-systems/musculoskeletal" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/musculoskeletal'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/review-of-systems/respiratory" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/respiratory'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/screening-tools/generic/1" => MockResponse::fixture('PersonChart/Encounters/ScreeningTools/generic'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/screening-tools/phq2/1" => MockResponse::fixture('PersonChart/Encounters/ScreeningTools/phq2'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/screening-tools/phq9/1" => MockResponse::fixture('PersonChart/Encounters/ScreeningTools/phq9'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/telephone-calls" => MockResponse::fixture('PersonChart/Encounters/telephoneCalls'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/telephone-communications" => MockResponse::fixture('PersonChart/Encounters/telephoneCommunications'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/vitals/1" => MockResponse::fixture('PersonChart/Encounters/vitals'),
                "{$this->apiUrl()}/persons/{$personId}/chart/family-history" => MockResponse::fixture('PersonChart/familyHistory'),
                "{$this->apiUrl()}/persons/{$personId}/chart/family-info" => MockResponse::fixture('PersonChart/familyInfo'),
                "{$this->apiUrl()}/persons/{$personId}/chart/forms/prapare" => MockResponse::fixture('PersonChart/formsPrapare'),
                "{$this->apiUrl()}/persons/{$personId}/chart/health-concerns/allergies" => MockResponse::fixture('PersonChart/HealthConcerns/allergies'),
                "{$this->apiUrl()}/persons/{$personId}/chart/health-concerns/assessment-scales" => MockResponse::fixture('PersonChart/HealthConcerns/assessmentScales'),
                "{$this->apiUrl()}/persons/{$personId}/chart/health-concerns/encounter-diagnosis" => MockResponse::fixture('PersonChart/HealthConcerns/encounterDiagnosis'),
                "{$this->apiUrl()}/persons/{$personId}/chart/health-concerns/family-histories-organizer" => MockResponse::fixture('PersonChart/HealthConcerns/familyHistoriesOrganizer'),
                "{$this->apiUrl()}/persons/{$personId}/chart/health-concerns/problem-observations" => MockResponse::fixture('PersonChart/HealthConcerns/problemObservations'),
                "{$this->apiUrl()}/persons/{$personId}/chart/health-concerns/social-history" => MockResponse::fixture('PersonChart/HealthConcerns/socialHistory'),
                "{$this->apiUrl()}/persons/{$personId}/chart/health-concerns/tobacco-smoking-usage-status" => MockResponse::fixture('PersonChart/HealthConcerns/tobacco'),
                "{$this->apiUrl()}/persons/{$personId}/chart/health-concerns/vitals" => MockResponse::fixture('PersonChart/HealthConcerns/vitals'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations" => MockResponse::fixture('PersonChart/Immunizations/immunizations'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/dose-validation" => MockResponse::fixture('PersonChart/Immunizations/doseValidation'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/exclusions" => MockResponse::fixture('PersonChart/Immunizations/exclusions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/group-status" => MockResponse::fixture('PersonChart/Immunizations/groupStatus'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/interactions" => MockResponse::fixture('PersonChart/Immunizations/interactions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/orders" => MockResponse::fixture('PersonChart/Immunizations/Orders/orders'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/orders/1" => MockResponse::fixture('PersonChart/Immunizations/Orders/order'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/orders/1/insurances" => MockResponse::fixture('PersonChart/Immunizations/Orders/insurances'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/orders/1/tracking-comments" => MockResponse::fixture('PersonChart/Immunizations/Orders/trackingComments'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/orders/1/vaccines" => MockResponse::fixture('PersonChart/Immunizations/Orders/Vaccines/vaccines'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1" => MockResponse::fixture('PersonChart/Immunizations/Orders/Vaccines/vaccine'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1/component-lot-numbers" => MockResponse::fixture('PersonChart/Immunizations/Orders/Vaccines/componentLotNumbers'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1/suspected-diagnoses" => MockResponse::fixture('PersonChart/Immunizations/Orders/Vaccines/suspectedDiagnoses'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1/vis-histories" => MockResponse::fixture('PersonChart/Immunizations/Orders/Vaccines/visHistories'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1/wasted-vaccines" => MockResponse::fixture('PersonChart/Immunizations/Orders/Vaccines/wastedVaccines'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/orders/1/vaccines/1/wasted-vaccines/1" => MockResponse::fixture('PersonChart/Immunizations/Orders/Vaccines/wastedVaccine'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/series-completions" => MockResponse::fixture('PersonChart/Immunizations/seriesCompletions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/immunizations/series-completions/1" => MockResponse::fixture('PersonChart/Immunizations/seriesCompletion'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/orders" => MockResponse::fixture('PersonChart/Lab/Orders/orders'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/orders/1" => MockResponse::fixture('PersonChart/Lab/Orders/order'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/orders/1/insurances" => MockResponse::fixture('PersonChart/Lab/Orders/insurances'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/orders/1/schedule" => MockResponse::fixture('PersonChart/Lab/Orders/schedule'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/orders/1/tests" => MockResponse::fixture('PersonChart/Lab/Orders/tests'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/orders/1/tests/1" => MockResponse::fixture('PersonChart/Lab/Orders/test'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/orders/1/tests/1/order-entry-answers" => MockResponse::fixture('PersonChart/Lab/Orders/orderEntryAnswer'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/orders/1/tests/1/suspected-diagnoses" => MockResponse::fixture('PersonChart/Lab/Orders/suspectedDiagnoses'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/orders/1/tracking-comments" => MockResponse::fixture('PersonChart/Lab/Orders/trackingComments'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/panels" => MockResponse::fixture('PersonChart/Lab/Panels/panels'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/panels/1" => MockResponse::fixture('PersonChart/Lab/Panels/panel'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/panels/1/results" => MockResponse::fixture('PersonChart/Lab/Panels/results'),
                "{$this->apiUrl()}/persons/{$personId}/chart/lab/results" => MockResponse::fixture('PersonChart/Lab/results'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medical-history" => MockResponse::fixture('PersonChart/medicalHistories'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medical-history/1" => MockResponse::fixture('PersonChart/medicalHistory'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medication-renewal-requests/1/medications" => MockResponse::fixture('PersonChart/medicationRenewalRequests'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications" => MockResponse::fixture('PersonChart/Medications/medications'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1" => MockResponse::fixture('PersonChart/Medications/medication'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/dosage-range" => MockResponse::fixture('PersonChart/Medications/dosageRange'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/dosage-orders" => MockResponse::fixture('PersonChart/Medications/dosageOrders'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/notes" => MockResponse::fixture('PersonChart/Medications/notes'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/notes/1" => MockResponse::fixture('PersonChart/Medications/note'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/dur-check" => MockResponse::fixture('PersonChart/Medications/durCheck'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/monograph-data" => MockResponse::fixture('PersonChart/Medications/monographData'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/patient-education" => MockResponse::fixture('PersonChart/Medications/patientEducation'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/pdmp-report" => MockResponse::fixture('PersonChart/Medications/pdmpReport'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/ob-flowsheets/1" => MockResponse::fixture('PersonChart/Obstetrics/Encounters/obFlowSheet'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/ob-initial-physical-exams" => MockResponse::fixture('PersonChart/Obstetrics/Encounters/obInitialPhysicalExams'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/ob-multi-gestation" => MockResponse::fixture('PersonChart/Obstetrics/Encounters/obMultiGestation'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/pap-details" => MockResponse::fixture('PersonChart/Obstetrics/Encounters/papDetails'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/sti-screening" => MockResponse::fixture('PersonChart/Obstetrics/Encounters/stiScreening'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/ob-flowsheets" => MockResponse::fixture('PersonChart/Obstetrics/obFlowsheets'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/ob-initial-physical-exams" => MockResponse::fixture('PersonChart/Obstetrics/obInitialPhysicalExam'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/ob-multi-gestation" => MockResponse::fixture('PersonChart/Obstetrics/obMultiGestation'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/pap-details" => MockResponse::fixture('PersonChart/Obstetrics/papDetails'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/pregnancies" => MockResponse::fixture('PersonChart/Obstetrics/pregnancies'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/problems" => MockResponse::fixture('PersonChart/Obstetrics/problems'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/problems/1" => MockResponse::fixture('PersonChart/Obstetrics/problem'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/risk-factors" => MockResponse::fixture('PersonChart/Obstetrics/riskFactors'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/sti-screenings" => MockResponse::fixture('PersonChart/Obstetrics/stiScreenings'),
                "{$this->apiUrl()}/persons/{$personId}/chart/orders/panels" => MockResponse::fixture('PersonChart/Orders/panels'),
                "{$this->apiUrl()}/persons/{$personId}/chart/orders/panels/1" => MockResponse::fixture('PersonChart/Orders/panel'),
                "{$this->apiUrl()}/persons/{$personId}/chart/orders/panels/1/results" => MockResponse::fixture('PersonChart/Orders/panelResults'),
                "{$this->apiUrl()}/persons/{$personId}/chart/orders/results" => MockResponse::fixture('PersonChart/Orders/results'),
                "{$this->apiUrl()}/persons/{$personId}/chart/pharmacies" => MockResponse::fixture('PersonChart/pharmacies'),
                "{$this->apiUrl()}/persons/{$personId}/chart/postpartum-check" => MockResponse::fixture('PersonChart/postpartumCheck'),
                "{$this->apiUrl()}/persons/{$personId}/chart/postpartum-visits" => MockResponse::fixture('PersonChart/postpartumVisits'),
                "{$this->apiUrl()}/persons/{$personId}/chart/pregnancies/encounters/82fb98c5-a588-4498-8b23-62b6b0700db3/gestational-age" => MockResponse::fixture('PersonChart/Pregnancies/encountersGestationalAge'),
                "{$this->apiUrl()}/persons/{$personId}/chart/pregnancies/gestational-age" => MockResponse::fixture('PersonChart/Pregnancies/gestationalAge'),
                "{$this->apiUrl()}/persons/{$personId}/chart/pregnancies/outcomes" => MockResponse::fixture('PersonChart/Pregnancies/outcomes'),
                "{$this->apiUrl()}/persons/{$personId}/chart/pregnancies/outcomes/1" => MockResponse::fixture('PersonChart/Pregnancies/outcome'),
                "{$this->apiUrl()}/persons/{$personId}/chart/problems" => MockResponse::fixture('PersonChart/Problems/problems'),
                "{$this->apiUrl()}/persons/{$personId}/chart/problems/1" => MockResponse::fixture('PersonChart/Problems/problem'),
                "{$this->apiUrl()}/persons/{$personId}/chart/problems/1/interactions" => MockResponse::fixture('PersonChart/Problems/interactions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/problems/1/notes" => MockResponse::fixture('PersonChart/Problems/notes'),
                "{$this->apiUrl()}/persons/{$personId}/chart/problems/1/notes/1" => MockResponse::fixture('PersonChart/Problems/note'),
                "{$this->apiUrl()}/persons/{$personId}/chart/problems/interactions" => MockResponse::fixture('PersonChart/Problems/interaction'),
                "{$this->apiUrl()}/persons/{$personId}/chart/procedures" => MockResponse::fixture('PersonChart/procedures'),
                "{$this->apiUrl()}/persons/{$personId}/chart/recall-plans" => MockResponse::fixture('PersonChart/recallPlans'),
                "{$this->apiUrl()}/persons/{$personId}/chart/recall-plans/1/1" => MockResponse::fixture('PersonChart/recallPlan'),
                "{$this->apiUrl()}/persons/{$personId}/chart/review-of-systems" => MockResponse::fixture('PersonChart/reviewOfSystems'),
                "{$this->apiUrl()}/persons/{$personId}/chart/social-history" => MockResponse::fixture('PersonChart/SocialHistory/socialHistories'),
                "{$this->apiUrl()}/persons/{$personId}/chart/social-history/alcohol-and-caffeine" => MockResponse::fixture('PersonChart/SocialHistory/alcoholCaffeine'),
                "{$this->apiUrl()}/persons/{$personId}/chart/social-history/alcohol-and-drug-usage" => MockResponse::fixture('PersonChart/SocialHistory/alcoholDrugUsage'),
                "{$this->apiUrl()}/persons/{$personId}/chart/social-history/comments" => MockResponse::fixture('PersonChart/SocialHistory/comments'),
                "{$this->apiUrl()}/persons/{$personId}/chart/social-history/diet" => MockResponse::fixture('PersonChart/SocialHistory/diet'),
                "{$this->apiUrl()}/persons/{$personId}/chart/social-history/employments" => MockResponse::fixture('PersonChart/SocialHistory/employments'),
                "{$this->apiUrl()}/persons/{$personId}/chart/social-history/lifestyle" => MockResponse::fixture('PersonChart/SocialHistory/lifestyle'),
                "{$this->apiUrl()}/persons/{$personId}/chart/social-history/statuses" => MockResponse::fixture('PersonChart/SocialHistory/statuses'),
                "{$this->apiUrl()}/persons/{$personId}/chart/social-history/tobacco-usage" => MockResponse::fixture('PersonChart/tobaccoUsage'),
                "{$this->apiUrl()}/persons/{$personId}/chart/social-history/vaping" => MockResponse::fixture('PersonChart/SocialHistory/vaping'),
                "{$this->apiUrl()}/persons/{$personId}/chart/support-roles" => MockResponse::fixture('PersonChart/supportRoles'),
                "{$this->apiUrl()}/persons/{$personId}/chart/telephone-calls" => MockResponse::fixture('PersonChart/telephoneCalls'),
                "{$this->apiUrl()}/persons/{$personId}/chart/tobacco-usage" => MockResponse::fixture('PersonChart/tobaccoUsage'),
                "{$this->apiUrl()}/persons/{$personId}/chart/today-encounter" => MockResponse::fixture('PersonChart/todayEncounter'),
                "{$this->apiUrl()}/persons/{$personId}/chart/vitals" => MockResponse::fixture('PersonChart/vitals'),
                "{$this->apiUrl()}/persons/chart/immunizations" => MockResponse::fixture('PersonChart/immunizations'),
                "{$this->apiUrl()}/persons/chart/medications" => MockResponse::fixture('PersonChart/medications'),
            ],
        ];

        return new MockClient($response);
    }

    protected function all(): array
    {
        return [
            [
                'name' => 'Chart 1',
                'category' => 'chart-1',
            ], [
                'name' => 'Chart 2',
                'category' => 'chart-2',
            ]
        ];
    }
}
