<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Master\AppointmentsRequest;
use Clinect\NextGen\Requests\Master\BulkOrderTestsRequest;
use Clinect\NextGen\Requests\Master\CodesRequest;
use Clinect\NextGen\Requests\Master\DiagnosesRequest;

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
}
