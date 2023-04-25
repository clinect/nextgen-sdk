<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait PersonChart
{
    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(), 
            ...[
                "{$this->url()}/chart" => MockResponse::make($this->all(), 200),
    
                "{$this->url()}/chart/id-3" => MockResponse::make([
                    'name' => 'Chart 3',
                    'category' => 'chart-3',
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
                "{$this->apiUrl()}/persons/{$personId}/chart/balances/1" => MockResponse::fixture('PersonChart/balance'),
                "{$this->apiUrl()}/persons/{$personId}/chart/care-plan-assessments" => MockResponse::fixture('PersonChart/CarePlan/assessments'),
                "{$this->apiUrl()}/persons/{$personId}/chart/care-plan/goals" => MockResponse::fixture('PersonChart/CarePlan/goals'),
                "{$this->apiUrl()}/persons/{$personId}/chart/care-plan/health-concerns" => MockResponse::fixture('PersonChart/healthConcerns'),
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
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/1" => MockResponse::fixture('PersonChart/Documents/document'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/1/1" => MockResponse::fixture('PersonChart/Documents/documentPage'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/1/pdf" => MockResponse::fixture('PersonChart/Documents/pdf'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/1/plain-text" => MockResponse::fixture('PersonChart/Documents/plainText'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/1/thumbnail/1" => MockResponse::fixture('PersonChart/Documents/thumbnail'),
                "{$this->apiUrl()}/persons/{$personId}/chart/documents/1/xml" => MockResponse::fixture('PersonChart/Documents/xml'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters" => MockResponse::fixture('PersonChart/Encounters/encounters'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1" => MockResponse::fixture('PersonChart/Encounters/encounter'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/allergies" => MockResponse::fixture('PersonChart/Encounters/allergies'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/allergies/1" => MockResponse::fixture('PersonChart/Encounters/allergy'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/allergies/1/reactions" => MockResponse::fixture('PersonChart/Encounters/allergiesReactions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/care-plan" => MockResponse::fixture('PersonChart/Encounters/CarePlan/carePlans'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/care-plan/health-concerns/1" => MockResponse::fixture('PersonChart/Encounters/CarePlan/healthConcerns'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/care-plan/health-concerns/1/goals" => MockResponse::fixture('PersonChart/Encounters/CarePlan/goals'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/care-plan/health-concerns/1/goals/1" => MockResponse::fixture('PersonChart/Encounters/CarePlan/goal'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/care-plan/health-concerns/1/goals/1/interventions" => MockResponse::fixture('PersonChart/Encounters/CarePlan/interventions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/care-plan/health-concerns/1/goals/1/interventions/1" => MockResponse::fixture('PersonChart/Encounters/CarePlan/interventions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/care-plan/health-concerns/1/goals/1/interventions/1/outcomes" => MockResponse::fixture('PersonChart/Encounters/CarePlan/interventionOutcomes'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/care-plan/health-concerns/1/goals/1/interventions/1/outcomes/1" => MockResponse::fixture('PersonChart/Encounters/CarePlan/interventionOutcome'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/clinical-notes" => MockResponse::fixture('PersonChart/Encounters/clinicalNotes'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/diagnoses" => MockResponse::fixture('PersonChart/Encounters/Diagnoses/allDiagnoses'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/diagnoses/1" => MockResponse::fixture('PersonChart/Encounters/Diagnoses/diagnoses'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/diagnoses/1/assessments" => MockResponse::fixture('PersonChart/Encounters/Diagnoses/assessments'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/diagnoses/1/interactions" => MockResponse::fixture('PersonChart/Encounters/Diagnoses/interactions'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/forms/prapare" => MockResponse::fixture('PersonChart/Encounters/formsPrapare'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/insurances" => MockResponse::fixture('PersonChart/Encounters/insurances'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/medications" => MockResponse::fixture('PersonChart/Encounters/medications'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/medications/1" => MockResponse::fixture('PersonChart/Encounters/medication'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/obstetrics/risk-factors" => MockResponse::fixture('PersonChart/Encounters/obstetricsRiskFactors'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/postpartum-check/1" => MockResponse::fixture('PersonChart/Encounters/postPartumCheck'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/postpartum-visit" => MockResponse::fixture('PersonChart/Encounters/postPartumVisit'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/pregnancies/gravidity-parity" => MockResponse::fixture('PersonChart/Encounters/pregnanciesGravidityParity'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/procedures/1" => MockResponse::fixture('PersonChart/Encounters/procedures'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/reasons-for-visit" => MockResponse::fixture('PersonChart/Encounters/reasonsForVisit'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/referral-orders" => MockResponse::fixture('PersonChart/Encounters/referralOrders'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/review-of-systems/cardiovascular" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/cardiovascular'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/review-of-systems/constitutional" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/constitutional'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/review-of-systems/enmt" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/enmt'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/review-of-systems/gastrointestinal" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/gastrointestinal'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/review-of-systems/genitourinary" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/genitourinary'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/review-of-systems/immunologic" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/immunologic'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/review-of-systems/musculoskeletal" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/musculoskeletal'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/review-of-systems/respiratory" => MockResponse::fixture('PersonChart/Encounters/ReviewOfSystems/respiratory'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/screening-tools/generic/1" => MockResponse::fixture('PersonChart/Encounters/ScreeningTools/generic'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/screening-tools/phq2/1" => MockResponse::fixture('PersonChart/Encounters/ScreeningTools/phq2'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/screening-tools/phq9/1" => MockResponse::fixture('PersonChart/Encounters/ScreeningTools/phq9'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/telephone-calls" => MockResponse::fixture('PersonChart/Encounters/telephoneCalls'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/telephone-communications" => MockResponse::fixture('PersonChart/Encounters/telephoneCommunications'),
                "{$this->apiUrl()}/persons/{$personId}/chart/encounters/1/vitals/1" => MockResponse::fixture('PersonChart/Encounters/vitals'),
                "{$this->apiUrl()}/persons/{$personId}/chart/family-history" => MockResponse::fixture('PersonChart/familyHistory'),
                "{$this->apiUrl()}/persons/{$personId}/chart/family-info" => MockResponse::fixture('PersonChart/familyInfo'),
                "{$this->apiUrl()}/persons/{$personId}/chart/forms-prapare" => MockResponse::fixture('PersonChart/formsPrapare'),
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
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/dosage-range" => MockResponse::fixture('PersonChart/Medications/dosageRange'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1" => MockResponse::fixture('PersonChart/Medications/medication'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/dosage-orders" => MockResponse::fixture('PersonChart/Medications/dosageOrders'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/notes" => MockResponse::fixture('PersonChart/Medications/notes'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/notes/1" => MockResponse::fixture('PersonChart/Medications/note'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/dur-check" => MockResponse::fixture('PersonChart/Medications/durCheck'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/monograph-data" => MockResponse::fixture('PersonChart/Medications/monographData'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/1/patient-education" => MockResponse::fixture('PersonChart/Medications/patientEducation'),
                "{$this->apiUrl()}/persons/{$personId}/chart/medications/pdmp-report" => MockResponse::fixture('PersonChart/Medications/pdmpReport'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/encounters/1/ob-flowsheets/1" => MockResponse::fixture('PersonChart/Obstetrics/Encounters/obFlowSheet'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/encounters/1/ob-initial-physical-exams" => MockResponse::fixture('PersonChart/Obstetrics/Encounters/obInitialPhysicalExams'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/encounters/1/ob-multi-gestation" => MockResponse::fixture('PersonChart/Obstetrics/Encounters/obMultiGestation'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/encounters/1/pap-details" => MockResponse::fixture('PersonChart/Obstetrics/Encounters/papDetails'),
                "{$this->apiUrl()}/persons/{$personId}/chart/obstetrics/encounters/1/sti-screening" => MockResponse::fixture('PersonChart/Obstetrics/Encounters/stiScreening'),
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
                "{$this->apiUrl()}/persons/{$personId}/chart/pregnancies/encounters/1/gestational-age" => MockResponse::fixture('PersonChart/Pregnancies/encountersGestationalAge'),
                "{$this->apiUrl()}/persons/{$personId}/chart/pregnancies/gestational-age" => MockResponse::fixture('PersonChart/Pregnancies/gestationalAge'),
                "{$this->apiUrl()}/persons/{$personId}/chart/pregnancies/outcomes" => MockResponse::fixture('PersonChart/Pregnancies/Outcomes'),
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