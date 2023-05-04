<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Persons\FormulariesRequest;
use Clinect\NextGen\Requests\Persons\InsurancesRequest;
use Clinect\NextGen\Requests\PersonsChart\ChartRequest;

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

    public function chart(): ChartRequest
    {
        $this->cleanUpEndpoint();
        return new ChartRequest($this->endpoint);
    }

    public function eligibilities(): static
    {
        return $this->addEndpoint('/eligibilities');
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
        return new InsurancesRequest($this->endpoint,$id);
    }

    public function medicationHistory(): static
    {
        return $this->addEndpoint('/medication-history');
    }

    public function photo(): static
    {
        return $this->addEndpoint('/photo');
    }

    public function races(): static
    {
        return $this->addEndpoint('/races');
    }

    public function relations(): static
    {
        return $this->addEndpoint('/relations');
    }

    public function supportRoles(): static
    {
        return $this->addEndpoint('/support-roles');
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
