<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\PersonsChart\AllergiesRequest;
use Clinect\NextGen\Requests\Request;

class EncountersRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    )
    {
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

    public function clinicalNotes(): static
    {
        return $this->addEndpoint('/clinical-notes');
    }

    public function diagnoses(int|string|null $id = null): DiagnosesRequest
    {
        $this->cleanUpEndpoint();
        return new DiagnosesRequest($this->endpoint, $id);
    }

    public function forms(): FormsRequest
    {
        $this->cleanUpEndpoint();
        return new FormsRequest($this->endpoint);
    }

    public function insurances(): static
    {
        return $this->addEndpoint('/insurances');
    }

    public function medications(int|string|null $id = null): static
    {
        return $this->addEndpoint('/medications')->withUriParamId($id);
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

    public function resonsForVisit(): static
    {
        return $this->addEndpoint('/reasons-for-visit');
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
