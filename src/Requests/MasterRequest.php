<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Master\AppointmentsRequest;
use Clinect\NextGen\Requests\Master\BulkOrderTestsRequest;
use Clinect\NextGen\Requests\Master\CodesRequest;
use Clinect\NextGen\Requests\Master\DiagnosesRequest;
use Clinect\NextGen\Requests\Master\DocumentFieldsRequest;
use Clinect\NextGen\Requests\Master\DocumentTypesRequest;
use Clinect\NextGen\Requests\Master\EnterprisesRequest;
use Clinect\NextGen\Requests\Master\EventsRequest;

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

    public function payers(int|string|null $id = null): static
    {
        return $this->addEndpoint('/payers')->withUriParamId($id);
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
        return $this->addEndpoint('/custom-picklist');
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
}
