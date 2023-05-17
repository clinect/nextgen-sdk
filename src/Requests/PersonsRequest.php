<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Persons\ImhRequest;
use Clinect\NextGen\Requests\Persons\OrdersRequest;
use Clinect\NextGen\Requests\Persons\InsurancesRequest;
use Clinect\NextGen\Requests\PersonsChart\ChartRequest;
use Clinect\NextGen\Requests\Persons\FormulariesRequest;
use Clinect\NextGen\Requests\Persons\MedicationHistoryRequest;

class PersonsRequest extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/persons';
    }

    public function addressHistories(): static
    {
        return $this->addEndpoint('/address-histories');
    }

    public function appointments(): static
    {
        return $this->addEndpoint('/appointments');
    }

    public function audit(): static
    {
        return $this->addEndpoint('/audit');
    }

    public function chart(): ChartRequest
    {
        $this->cleanUpEndpoint();
        return new ChartRequest($this->endpoint);
    }

    public function eligibilities(): static
    {
        return $this->addEndpoint('/eligibilities');
    }

    public function createEligibilities(): static
    {
        return $this->addEndpoint('/eligibilities/create-request');
    }

    public function employers(int|string|null $id = null): static
    {
        return $this->addEndpoint('/employers')->withUriParamId($id);
    }

    public function ethnicities(): static
    {
        return $this->addEndpoint('/ethnicities');
    }

    public function formularies(): FormulariesRequest
    {
        $this->cleanUpEndpoint();
        return new FormulariesRequest($this->endpoint);
    }

    public function genderIdentities(): static
    {
        return $this->addEndpoint('/gender-identities');
    }

    public function insurances(int|string|null $id = null): InsurancesRequest
    {
        $this->cleanUpEndpoint();
        return new InsurancesRequest($this->endpoint, $id);
    }

    public function imhForms(): ImhRequest
    {
        $this->cleanUpEndpoint();
        return new ImhRequest($this->endpoint);
    }

    public function medicationHistory(): MedicationHistoryRequest
    {
        $this->cleanUpEndpoint();
        return new MedicationHistoryRequest($this->endpoint);
    }

    public function orders(): OrdersRequest
    {
        $this->cleanUpEndpoint();
        return new OrdersRequest($this->endpoint);
    }

    public function photo(): static
    {
        return $this->addEndpoint('/photo');
    }

    public function races(): static
    {
        return $this->addEndpoint('/races');
    }

    public function relations(int|string|null $id = null): static
    {
        return $this->addEndpoint('/relations')->withUriParamId($id);
    }

    public function supportRoles(int|string|null $id = null): static
    {
        return $this->addEndpoint('/support-roles')->withUriParamId($id);
    }

    public function lookup(): static
    {
        return $this->addEndpoint('/lookup');
    }

    public function merged(): static
    {
        return $this->addEndpoint('/merged');
    }

    public function payers(): static
    {
        return $this->addEndpoint('/payers');
    }
}
