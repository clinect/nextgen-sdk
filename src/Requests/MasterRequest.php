<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Master\CodesRequest;
use Clinect\NextGen\Requests\Master\TasksRequest;
use Clinect\NextGen\Requests\Master\EventsRequest;
use Clinect\NextGen\Requests\Master\PayersRequest;
use Clinect\NextGen\Requests\Master\LabTestsRequest;
use Clinect\NextGen\Requests\Master\VaccinesRequest;
use Clinect\NextGen\Requests\Master\DiagnosesRequest;
use Clinect\NextGen\Requests\Master\PracticesRequest;
use Clinect\NextGen\Requests\Master\EnterprisesRequest;
use Clinect\NextGen\Requests\Master\MedicationsRequest;
use Clinect\NextGen\Requests\Master\SpecialtiesRequest;
use Clinect\NextGen\Requests\Master\AppointmentsRequest;
use Clinect\NextGen\Requests\Master\DocumentTypesRequest;
use Clinect\NextGen\Requests\Master\BulkOrderTestsRequest;
use Clinect\NextGen\Requests\Master\DocumentFieldsRequest;
use Clinect\NextGen\Requests\Master\ViewCategoriesRequest;

class MasterRequest extends Request
{
    public function defaultEndpoint(): string
    {
        return '/master';
    }

    public function alertMessages(): static
    {
        return $this->addEndpoint('/alert-messages');
    }

    public function alertTypes(): static
    {
        return $this->addEndpoint('/alert-types');
    }

    public function allergies(): static
    {
        return $this->addEndpoint('/allergies');
    }

    public function allergyReactions(): static
    {
        return $this->addEndpoint('/allergy-reactions');
    }
    public function appointments(): AppointmentsRequest
    {
        $this->cleanUpEndpoint();
        return new AppointmentsRequest($this->endpoint);
    }

    public function bulkOrderTests(int|string|null $id = null): BulkOrderTestsRequest
    {
        $this->cleanUpEndpoint();
        return new BulkOrderTestsRequest($this->endpoint, $id);
    }

    public function codes(int|string|null $id = null): CodesRequest
    {
        $this->cleanUpEndpoint();
        return new CodesRequest($this->endpoint, $id);
    }

    public function customDosageAdminOptions(): static
    {
        return $this->addEndpoint('/custom-dosage-admin-options');
    }

    public function customDosageIntervalUnits(): static
    {
        return $this->addEndpoint('/custom-dosage-interval-units');
    }

    public function customDosageQuantityUnits(): static
    {
        return $this->addEndpoint('/custom-dosage-quantity-units');
    }

    public function customDosageRouteOptions(): static
    {
        return $this->addEndpoint('/custom-dosage-route-options');
    }

    public function customPicklistItems(): static
    {
        return $this->addEndpoint('/custom-picklist-items');
    }

    public function customPicklist(): static
    {
        return $this->addEndpoint('/custom-picklists');
    }

    public function diagnoses(): DiagnosesRequest
    {
        $this->cleanUpEndpoint();
        return new DiagnosesRequest($this->endpoint);
    }

    public function diagnosisCategories(): static
    {
        return $this->addEndpoint('/diagnosis-categories');
    }

    public function diagnosisSeverities(): static
    {
        return $this->addEndpoint('/diagnosis-severities');
    }

    public function diagnosisStatuses(): static
    {
        return $this->addEndpoint('/diagnosis-statuses');
    }

    public function diagnosticTests(): static
    {
        return $this->addEndpoint('/Diagnostic-tests');
    }

    public function documentFields(int|string|null $id = null): DocumentFieldsRequest
    {
        $this->cleanUpEndpoint();
        return new DocumentFieldsRequest($this->endpoint, $id);
    }

    public function documentTypes(int|string|null $id = null): DocumentTypesRequest
    {
        $this->cleanUpEndpoint();
        return new DocumentTypesRequest($this->endpoint, $id);
    }

    public function enterprises(int|string|null $id = null): EnterprisesRequest
    {
        $this->cleanUpEndpoint();
        return new EnterprisesRequest($this->endpoint, $id);
    }

    public function events(int|string|null $id = null): EventsRequest
    {
        $this->cleanUpEndpoint();
        return new EventsRequest($this->endpoint, $id);
    }

    public function externalOrganizations(): static
    {
        return $this->addEndpoint('/external-organizations');
    }

    public function externalSystems(): static
    {
        return $this->addEndpoint('/external-systems');
    }

    public function immunizationFundingSources(): static
    {
        return $this->addEndpoint('/immunization-funding-sources');
    }

    public function labTests(int|string|null $id = null): LabTestsRequest
    {
        $this->cleanUpEndpoint();
        return new LabTestsRequest($this->endpoint, $id);
    }

    public function listItems(): static
    {
        return $this->addEndpoint('/list-items');
    }

    public function locations(): static
    {
        return $this->addEndpoint('/locations');
    }

    public function locationsDefault(): static
    {
        return $this->addEndpoint('/locations/default');
    }

    public function medications(int|string|null $id = null): MedicationsRequest
    {
        $this->cleanUpEndpoint();
        return new MedicationsRequest($this->endpoint, $id);
    }

    public function modifiers(): static
    {
        return $this->addEndpoint('/modifiers');
    }

    public function myLists(int|string|null $id = null): static
    {
        return $this->addEndpoint('/my-lists')->withUriParamId($id);
    }

    public function orderableVaccines(): static
    {
        return $this->addEndpoint('/orderable-vaccines');
    }

    public function patientStatuses(): static
    {
        return $this->addEndpoint('/patient-statuses');
    }

    public function payers(int|string|null $id = null): PayersRequest
    {
        $this->cleanUpEndpoint();
        return new PayersRequest($this->endpoint, $id);
    }

    public function paymentReasons(): static
    {
        return $this->addEndpoint('/payment-reasons');
    }

    public function pharmacies(int|string|null $id = null): static
    {
        return $this->addEndpoint('/pharmacies')->withUriParamId($id);
    }

    public function practices(int|string|null $id = null): PracticesRequest
    {
        $this->cleanUpEndpoint();
        return new PracticesRequest($this->endpoint, $id);
    }

    public function practitioners(): static
    {
        return $this->addEndpoint('/practitioners');
    }

    public function problemsSearch(array $queries = null): \Saloon\Http\Request
    {
        return $this->addEndpoint('/problems/search')->withQuery($queries)->get();
    }

    public function procedureGroups(): static
    {
        return $this->addEndpoint('/procedure-groups');
    }

    public function procedures(): static
    {
        return $this->addEndpoint('/procedures');
    }

    public function providerTaxonomies(): static
    {
        return $this->addEndpoint('/provider-taxonomies');
    }

    public function recallPlans(): static
    {
        return $this->addEndpoint('/recall-plans');
    }

    public function specialties(int|string|null $id = null): SpecialtiesRequest
    {
        $this->cleanUpEndpoint();
        return new SpecialtiesRequest($this->endpoint, $id);
    }

    public function systemOptions(): static
    {
        return $this->addEndpoint('/system-options');
    }

    public function tasks(): TasksRequest
    {
        $this->cleanUpEndpoint();
        return new TasksRequest($this->endpoint);
    }

    public function timeZones(): static
    {
        return $this->addEndpoint('/time-zones');
    }

    public function transactionCodes(): static
    {
        return $this->addEndpoint('/transaction-codes');
    }

    public function userGroups(): static
    {
        return $this->addEndpoint('/user-groups');
    }

    public function vaccineInventory(int|string|null $id = null): static
    {
        return $this->addEndpoint('/vaccine-inventory')->withUriParamId($id);
    }

    public function vaccineManufacturers(): static
    {
        return $this->addEndpoint('/vaccine-manufacturers');
    }

    public function vaccineSchedules(): static
    {
        return $this->addEndpoint('/vaccine-schedules');
    }

    public function vaccines(int|string|null $id = null): VaccinesRequest
    {
        $this->cleanUpEndpoint();
        return new VaccinesRequest($this->endpoint, $id);
    }

    public function vfcCodes(): static
    {
        return $this->addEndpoint('/vfc-codes');
    }

    public function viewCategories(int|string|null $id = null): ViewCategoriesRequest
    {
        $this->cleanUpEndpoint();
        return new ViewCategoriesRequest($this->endpoint, $id);
    }

    public function zipCodes(): static
    {
        return $this->addEndpoint('/zip-codes');
    }
}
