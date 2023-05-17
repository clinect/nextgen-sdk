<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class VaccinesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/vaccines';
    }

    public function componentLotNumbers(): static
    {
        return $this->addEndpoint('/component-lot-numbers');
    }

    public function suspectedDiagnoses(): static
    {
        return $this->addEndpoint('/suspected-diagnoses');
    }

    public function visHistories(int|string|null $id = null): static
    {
        return $this->addEndpoint('/vis-histories')->withUriParamId($id);
    }

    public function wastedVaccines(int|string|null $id = null): static
    {
        return $this->addEndpoint('/wasted-vaccines')->withUriParamId($id);
    }
}
