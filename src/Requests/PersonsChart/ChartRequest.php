<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class ChartRequest extends Request
{
    public function __construct(
        public string $endPoint
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/chart';
    }

    public function alerts(int|string|null $id = null): static
    {
        return $this->addEndpoint('/alerts')->withUriParamId($id);
    }

    public function allergies(int|string|null $id = null): AllergiesRequest
    {
        $this->cleanUpEndpoint();
        return new AllergiesRequest($this->endpoint, $id);
    }

    public function assessments(): static
    {
        return $this->addEndpoint('/assessments');
    }

    public function balances(int|string|null $id = null): static
    {
        return $this->addEndpoint('/balances')->withUriParamId($id);
    }

    public function carePlanAssessments(): static
    {
        return $this->addEndpoint('/care-plan-assessments');
    }

    public function carePlan(): CarePlanRequest
    {
        $this->cleanUpEndpoint();
        return new CarePlanRequest($this->endpoint);
    }

    public function careTeamMembers(): static
    {
        return $this->addEndpoint('/care-team-members');
    }

    public function charges(): static
    {
        return $this->addEndpoint('/charges');
    }

    public function clinicalNotes(): static
    {
        return $this->addEndpoint('/clinical-notes');
    }

    public function deletedAllergies(): static
    {
        return $this->addEndpoint('/deleted-allergies');
    }

    public function deletedDiagnoses(): static
    {
        return $this->addEndpoint('/deleted-diagnoses');
    }

    public function devices(int|string|null $id = null): static
    {
        return $this->addEndpoint('/devices')->withUriParamId($id);
    }

    public function diagnoses(int|string|null $id = null): DiagnosesRequest
    {
        $this->cleanUpEndpoint();
        return new DiagnosesRequest($this->endpoint, $id);
    }

    public function diagnostic(): DiagnosticRequest
    {
        $this->cleanUpEndpoint();
        return new DiagnosticRequest($this->endpoint);
    }

    public function documents(int|string|null $id = null): DocumentsRequest
    {
        $this->cleanUpEndpoint();
        return new DocumentsRequest($this->endpoint, $id);
    }

    public function encounters(int|string|null $id = null): EncountersRequest
    {
        $this->cleanUpEndpoint();
        return new EncountersRequest($this->endpoint, $id);
    }

    public function familyHistory(): static
    {
        return $this->addEndpoint('/family-history');
    }

    public function familyInfo(): static
    {
        return $this->addEndpoint('/family-info');
    }

    public function forms(): FormsRequest
    {
        $this->cleanUpEndpoint();
        return new FormsRequest($this->endpoint);
    }

    public function healthConcerns(): HealthConcernsRequest
    {
        $this->cleanUpEndpoint();
        return new HealthConcernsRequest($this->endpoint);
    }

    public function immunizations(): ImmunizationsRequest
    {
        $this->cleanUpEndpoint();
        return new ImmunizationsRequest($this->endpoint);
    }

    public function lab(): LabRequest
    {
        $this->cleanUpEndpoint();
        return new LabRequest($this->endpoint);
    }

    public function medicalHistory(int|string|null $id = null): static
    {
        return $this->addEndpoint('/medical-history')->withUriParamId($id);
    }

    public function medicationRenewalRequests(int|string|null $id): MedicationRenewalRequest
    {
        $this->cleanUpEndpoint();
        return new MedicationRenewalRequest($this->endpoint, $id);
    }

    public function medications(int|string|null $id = null): MedicationsRequest
    {
        $this->cleanUpEndpoint();
        return new MedicationsRequest($this->endpoint, $id);
    }

    public function obstetrics(): ObstetricsRequest
    {
        $this->cleanUpEndpoint();
        return new ObstetricsRequest($this->endpoint);
    }

    public function orders(): ChartOrdersRequest
    {
        $this->cleanUpEndpoint();
        return new ChartOrdersRequest($this->endpoint);
    }

    public function pharmacies(): static
    {
        return $this->addEndpoint('/pharmacies');
    }
}
