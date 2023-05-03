<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Master
{
    private $apiConnector;
    private $mockConnector;

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/master" => MockResponse::make($this->all(), 200),

                "{$this->url()}/master/payers" => MockResponse::make($this->all('payer'), 200),

                "{$this->url()}/master/payers/id-2/copays" => MockResponse::make([
                    'name' => 'Master Payer 2',
                    'category' => 'master-payer-2',
                ], 200),
            ],
        ];

        return new MockClient($response);
    }

    protected function fixtureClient(): MockClient
    {
        $response = [
            ...$this->apiAuthorize(),
            ...[
                "{$this->apiUrl()}/master/alert-messages" => MockResponse::fixture('Master/alertMessages'),
                "{$this->apiUrl()}/master/alert-types" => MockResponse::fixture('Master/alertTypes'),
                "{$this->apiUrl()}/master/allergies" => MockResponse::fixture('Master/allergies'),
                "{$this->apiUrl()}/master/allergy-reactions" => MockResponse::fixture('Master/allergyReactions'),
                "{$this->apiUrl()}/master/appointments/categories" => MockResponse::fixture('Master/Appointments/categories'),
                "{$this->apiUrl()}/master/appointments/categories/1" => MockResponse::fixture('Master/Appointments/category'),
                "{$this->apiUrl()}/master/appointments/categories/1/events" => MockResponse::fixture('Master/Appointments/categoryEvents'),
                "{$this->apiUrl()}/master/appointments/classes" => MockResponse::fixture('Master/Appointments/classes'),
                "{$this->apiUrl()}/master/appointments/classes/1/resources" => MockResponse::fixture('Master/Appointments/classResources'),
                "{$this->apiUrl()}/master/bulk-order-tests" => MockResponse::fixture('Master/bulkOrderTests'),
                "{$this->apiUrl()}/master/bulk-order-tests/1/diagnoses" => MockResponse::fixture('Master/bulkOrderTestDiagnoses'),
                "{$this->apiUrl()}/master/codes" => MockResponse::fixture('Master/codes'),
                "{$this->apiUrl()}/master/codes/1" => MockResponse::fixture('Master/code'),
                "{$this->apiUrl()}/master/codes/icd9/1/icd10" => MockResponse::fixture('Master/code-icd10'),
                "{$this->apiUrl()}/master/custom-dosage-admin-options" => MockResponse::fixture('Master/Custom/dosageAdminOptions'),
                "{$this->apiUrl()}/master/custom-dosage-interval-units" => MockResponse::fixture('Master/Custom/dosageIntervalUnits'),
                "{$this->apiUrl()}/master/custom-dosage-quantity-units" => MockResponse::fixture('Master/Custom/dosageQuantityUnits'),
                "{$this->apiUrl()}/master/custom-dosage-route-options" => MockResponse::fixture('Master/Custom/dosageRouteOptions'),
                "{$this->apiUrl()}/master/custom-picklist-items" => MockResponse::fixture('Master/Custom/picklistItems'),
                "{$this->apiUrl()}/master/custom-picklists" => MockResponse::fixture('Master/Custom/picklists'),
                "{$this->apiUrl()}/master/diagnoses" => MockResponse::fixture('Master/diagnoses'),
                "{$this->apiUrl()}/master/diagnoses/search" => MockResponse::fixture('Master/diagnosesSearch'),
                "{$this->apiUrl()}/master/diagnosis-categories" => MockResponse::fixture('Master/diagnosisCategories'),
                "{$this->apiUrl()}/master/diagnosis-severities" => MockResponse::fixture('Master/diagnosisSeverities'),
                "{$this->apiUrl()}/master/diagnosis-statuses" => MockResponse::fixture('Master/diagnosisStatuses'),
                "{$this->apiUrl()}/master/Diagnostic-tests" => MockResponse::fixture('Master/diagnosticTests'),
                "{$this->apiUrl()}/master/document-fields" => MockResponse::fixture('Master/documentFields'),
                "{$this->apiUrl()}/master/document-fields/1/picklist-items" => MockResponse::fixture('Master/documentFieldPickListItems'),
                "{$this->apiUrl()}/master/document-types" => MockResponse::fixture('Master/documentTypes'),
                "{$this->apiUrl()}/master/document-types/1/fields" => MockResponse::fixture('Master/documentTypeField'),
                "{$this->apiUrl()}/master/enterprises" => MockResponse::fixture('Master/enterprises'),
                "{$this->apiUrl()}/master/enterprises/1/options" => MockResponse::fixture('Master/enterprisesOptions'),
                "{$this->apiUrl()}/master/events" => MockResponse::fixture('Master/Events/events'),
                "{$this->apiUrl()}/master/events/1/categories" => MockResponse::fixture('Master/Events/categories'),
                "{$this->apiUrl()}/master/events/1/locations" => MockResponse::fixture('Master/Events/locations'),
                "{$this->apiUrl()}/master/events/1/resource-limits" => MockResponse::fixture('Master/Events/resourceLimits'),
                "{$this->apiUrl()}/master/events/1/resource-overrides" => MockResponse::fixture('Master/Events/resourceOverrides'),
                "{$this->apiUrl()}/master/events/1/resources" => MockResponse::fixture('Master/Events/resources'),
                "{$this->apiUrl()}/master/external-organizations" => MockResponse::fixture('Master/externalOrganizations'),
                "{$this->apiUrl()}/master/external-systems" => MockResponse::fixture('Master/externalSystems'),
                "{$this->apiUrl()}/master/immunization-funding-sources" => MockResponse::fixture('Master/immunizationFundingSources'),
                "{$this->apiUrl()}/master/lab-tests" => MockResponse::fixture('Master/labTests'),
                "{$this->apiUrl()}/master/lab-tests/1/components" => MockResponse::fixture('Master/labTestComponents'),
                "{$this->apiUrl()}/master/lab-tests/1/order-entry-questions" => MockResponse::fixture('Master/labTestOrderEntryQuestions'),
                "{$this->apiUrl()}/master/list-items" => MockResponse::fixture('Master/listItems'),
                "{$this->apiUrl()}/master/locations" => MockResponse::fixture('Master/locations'),
                "{$this->apiUrl()}/master/locations/default" => MockResponse::fixture('Master/locationsDefault'),
                "{$this->apiUrl()}/master/medications" => MockResponse::fixture('Master/Medications/medications'),
                "{$this->apiUrl()}/master/medications/1/dosage-orders" => MockResponse::fixture('Master/Medications/dosageOrders'),
                "{$this->apiUrl()}/master/medications/1/fdb-dosage-orders" => MockResponse::fixture('Master/Medications/fdbDosage'),
                "{$this->apiUrl()}/master/medications/1" => MockResponse::fixture('Master/Medications/medication'),
                "{$this->apiUrl()}/master/medications/1/related" => MockResponse::fixture('Master/Medications/related'),
                "{$this->apiUrl()}/master/medications/defaults" => MockResponse::fixture('Master/Medications/defaults'),
                "{$this->apiUrl()}/master/medications/dosage-reason-options" => MockResponse::fixture('Master/Medications/dosageReasonOptions'),
                "{$this->apiUrl()}/master/medications/refill-denial-reasons" => MockResponse::fixture('Master/Medications/refillDenialReasons'),
                "{$this->apiUrl()}/master/medications/rxchange-denial-reasons" => MockResponse::fixture('Master/Medications/rxchangeDenialReasons'),
                "{$this->apiUrl()}/master/modifiers" => MockResponse::fixture('Master/modifiers'),
                "{$this->apiUrl()}/master/my-lists" => MockResponse::fixture('Master/myLists'),
                "{$this->apiUrl()}/master/my-lists/1" => MockResponse::fixture('Master/myList'),
                "{$this->apiUrl()}/master/orderable-vaccines" => MockResponse::fixture('Master/orderableVaccines'),
                "{$this->apiUrl()}/master/patient-statuses" => MockResponse::fixture('Master/patientStatuses'),
                "{$this->apiUrl()}/master/payers" => MockResponse::fixture('Master/payers'),
                "{$this->apiUrl()}/master/payers/1/copays" => MockResponse::fixture('Master/copays'),
                "{$this->apiUrl()}/master/payers/1/copays/1/specialties" => MockResponse::fixture('Master/copaysSpecialties'),
                "{$this->apiUrl()}/master/payment-reasons" => MockResponse::fixture('Master/paymentReasons'),
                "{$this->apiUrl()}/master/pharmacies" => MockResponse::fixture('Master/pharmacies'),
                "{$this->apiUrl()}/master/pharmacies/1" => MockResponse::fixture('Master/phaymacy'),
                "{$this->apiUrl()}/master/practices" => MockResponse::fixture('Master/Practices/practices'),
                "{$this->apiUrl()}/master/practices/1/diagnostic-tests" => MockResponse::fixture('Master/Practices/diagnosticTests'),
                "{$this->apiUrl()}/master/practices/1/lab-tests" => MockResponse::fixture('Master/Practices/labTests'),
                "{$this->apiUrl()}/master/practices/1/locations" => MockResponse::fixture('Master/Practices/locations'),
                "{$this->apiUrl()}/master/practices/1/options" => MockResponse::fixture('Master/Practices/options'),
                "{$this->apiUrl()}/master/practices/1/payers" => MockResponse::fixture('Master/Practices/payers'),
                "{$this->apiUrl()}/master/practitioners" => MockResponse::fixture('Master/practitioners'),
                "{$this->apiUrl()}/master/problems/search" => MockResponse::fixture('Master/problemsSearch'),
                "{$this->apiUrl()}/master/procedure-groups" => MockResponse::fixture('Master/procedureGroups'),
                "{$this->apiUrl()}/master/procedures" => MockResponse::fixture('Master/procedures'),
                "{$this->apiUrl()}/master/provider-taxonomies" => MockResponse::fixture('Master/providerTaxonomies'),
                "{$this->apiUrl()}/master/recall-plans" => MockResponse::fixture('Master/recallPlans'),
                "{$this->apiUrl()}/master/specialties" => MockResponse::fixture('Master/specialties'),
                "{$this->apiUrl()}/master/specialties/1/diagnostic-tests" => MockResponse::fixture('Master/specialties-diagnosticTests'),
                "{$this->apiUrl()}/master/specialties/1/lab-tests" => MockResponse::fixture('Master/specialties-labTests'),
                "{$this->apiUrl()}/master/system-options" => MockResponse::fixture('Master/systemOptions'),
                "{$this->apiUrl()}/master/tasks/categories" => MockResponse::fixture('Master/Tasks/categories'),
                "{$this->apiUrl()}/master/tasks/priorities" => MockResponse::fixture('Master/Tasks/priorities'),
                "{$this->apiUrl()}/master/tasks/workgroups" => MockResponse::fixture('Master/Tasks/workgroups'),
                "{$this->apiUrl()}/master/tasks/workgroups/1/my-lists" => MockResponse::fixture('Master/Tasks/workgroupMyLists'),
                "{$this->apiUrl()}/master/tasks/workgroups/1/workgroup-users" => MockResponse::fixture('Master/Tasks/workgroupUsers'),
                "{$this->apiUrl()}/master/time-zones" => MockResponse::fixture('Master/timezones'),
                "{$this->apiUrl()}/master/transaction-codes" => MockResponse::fixture('Master/transactionCodes'),
                "{$this->apiUrl()}/master/user-groups" => MockResponse::fixture('Master/userGroups'),
                "{$this->apiUrl()}/master/vaccine-inventory" => MockResponse::fixture('Master/Vaccine/Inventories'),
                "{$this->apiUrl()}/master/vaccine-inventory/1" => MockResponse::fixture('Master/Vaccine/Inventory'),
                "{$this->apiUrl()}/master/vaccine-manufacturers" => MockResponse::fixture('Master/Vaccine/Manufacturers'),
                "{$this->apiUrl()}/master/vaccine-schedules" => MockResponse::fixture('Master/Vaccine/Schedules'),
                "{$this->apiUrl()}/master/vaccines" => MockResponse::fixture('Master/Vaccine/vaccines'),
                "{$this->apiUrl()}/master/vaccines/1/related" => MockResponse::fixture('Master/Vaccine/related'),
                "{$this->apiUrl()}/master/vaccines/1/vis" => MockResponse::fixture('Master/Vaccine/vis'),
                "{$this->apiUrl()}/master/vaccines/1/vis/1" => MockResponse::fixture('Master/Vaccine/specificVis'),
                "{$this->apiUrl()}/master/vfc-codes" => MockResponse::fixture('Master/vfcCodes'),
                "{$this->apiUrl()}/master/view-categories" => MockResponse::fixture('Master/ViewCategories'),
                "{$this->apiUrl()}/master/view-categories/1/items-external-types" => MockResponse::fixture('Master/ViewCategories/itemsExternalTypes'),
                "{$this->apiUrl()}/master/view-categories/1/items-types" => MockResponse::fixture('Master/ViewCategories/itemTypes'),
                "{$this->apiUrl()}/master/zip-codes" => MockResponse::fixture('Master/zipCodes'),
            ],
        ];

        return new MockClient($response);
    }

    protected function all(string $type = 'master'): array
    {
        return $type == 'master' ? [
            [
                'name' => 'Master 1',
                'category' => 'master-1',
            ], [
                'name' => 'Master 2',
                'category' => 'master-payer-2',
            ]
        ] : [
            [
                'name' => 'Master Payer 1',
                'category' => 'master-payer-1',
            ], [
                'name' => 'Master Payer 2',
                'category' => 'master-payer-2',
            ]
        ];
    }
}
