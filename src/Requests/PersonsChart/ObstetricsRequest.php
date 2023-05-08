<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class ObstetricsRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/obstetrics';
    }

    public function riskFactors(): static
    {
        return $this->addEndpoint('/risk-factors');
    }

    public function encounters(int|string|null $id): ObstetricsEncountersRequest
    {
        $this->cleanUpEndpoint();
        return new ObstetricsEncountersRequest($this->endpoint, $id);
    }

    public function obFlowsheets(): static
    {
        return $this->addEndpoint('/ob-flowsheets');
    }

    public function obInitialPhysicalExams(): static
    {
        return $this->addEndpoint('/ob-initial-physical-exams');
    }

    public function obMultiGestation(): static
    {
        return $this->addEndpoint('/ob-multi-gestation');
    }

    public function papDetails(): static
    {
        return $this->addEndpoint('/pap-details');
    }

    public function pregnancies(): static
    {
        return $this->addEndpoint('/pregnancies');
    }

    public function problems(int|string|null $id = null): static
    {
        return $this->addEndpoint('/problems')->withUriParamId($id);
    }

    public function stiScreening(): static
    {
        return $this->addEndpoint('/sti-screenings');
    }
}
