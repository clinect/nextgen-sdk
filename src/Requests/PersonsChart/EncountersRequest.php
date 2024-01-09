<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class EncountersRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/encounters';
    }

    public function allergies(int|string|null $id = null): AllergiesRequest
    {
        $this->cleanUpEndpoint();
        return new AllergiesRequest($this->endpoint, $id);
    }

    public function carePlan(): CarePlanRequest
    {
        $this->cleanUpEndpoint();
        return new CarePlanRequest($this->endpoint);
    }

    public function checkIn(): static
    {
        return $this->addEndpoint('/checkin');
    }

    public function checkout(): static
    {
        return $this->addEndpoint('/checkout');
    }

    public function clinicalNotes(): static
    {
        return $this->addEndpoint('/clinical-notes');
    }

    public function diagnoses(int|string|null $id = null): DiagnosesRequest
    {
        $this->cleanUpEndpoint();
        return new DiagnosesRequest($this->endpoint, $id);
    }

    public function diagnosticOrders(): static
    {
        return $this->addEndpoint('/diagnostic/orders');
    }

    public function dmeOrders(): static
    {
        return $this->addEndpoint('/dme/orders');
    }

    public function documents(): static
    {
        return $this->addEndpoint('/documents');
    }

    public function followUpOrders(): static
    {
        return $this->addEndpoint('/follow-up-orders');
    }

    public function forms(): FormsRequest
    {
        $this->cleanUpEndpoint();
        return new FormsRequest($this->endpoint);
    }

    public function immunizations(): ImmunizationsRequest
    {
        $this->cleanUpEndpoint();
        return new ImmunizationsRequest($this->endpoint);
    }

    public function insurances(int|string|null $id = null): static
    {
        return $this->addEndpoint('/insurances')->withUriParamId($id);
    }
    public function insurance(int|string|null $id = null): static
    {
        return $this->addEndpoint('/insurance')->withUriParamId($id);
    }
    public function labOrders(): static
    {
        return $this->addEndpoint('/lab/orders');
    }

    public function lock(): static
    {
        return $this->addEndpoint('/lock');
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

    public function postpartumCheck(int|string|null $id): static
    {
        return $this->addEndpoint('/postpartum-check')->withUriParamId($id);
    }

    public function postpartumVisit(): static
    {
        return $this->addEndpoint('/postpartum-visit');
    }

    public function pregnancies(): PregnanciesRequest
    {
        $this->cleanUpEndpoint();
        return new PregnanciesRequest($this->endpoint);
    }

    public function procedures(int|string|null $id = null): static
    {
        return $this->addEndpoint('/procedures')->withUriParamId($id);
    }

    public function reasonsForVisit(): static
    {
        return $this->addEndpoint('/reasons-for-visit');
    }

    public function genericReasonsForVisit(): static
    {
        return $this->addEndpoint('/reasons-for-visit/generic');
    }

    public function referralOrders(): static
    {
        return $this->addEndpoint('/referral-orders');
    }

    public function reviewOfSystems(): ReviewOfSystemsRequest
    {
        $this->cleanUpEndpoint();
        return new ReviewOfSystemsRequest($this->endpoint);
    }

    public function screeningTools(): ScreeningToolsRequest
    {
        $this->cleanUpEndpoint();
        return new ScreeningToolsRequest($this->endpoint);
    }

    public function telephoneCalls(): static
    {
        return $this->addEndpoint('/telephone-calls');
    }

    public function telephoneCall(): static
    {
        return $this->addEndpoint('/telephone-call');
    }

    public function telephoneCommunications(): static
    {
        return $this->addEndpoint('/telephone-communications');
    }

    public function vitals(int|string|null $id): static
    {
        return $this->addEndpoint('/vitals')->withUriParamId($id);
    }

    public function gestationalAge(): static
    {
        return $this->addEndpoint('/gestational-age');
    }
}
