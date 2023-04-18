<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class ObstetricsEncountersRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/encounters';
    }

    public function obFlowSheets(int|string|null $id): static
    {
        return $this->addEndpoint('/ob-flowsheets')->withUriParamId($id);
    }

    public function obInitialPhysicalExam(): static
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

    public function stiScreening(): static
    {
        return $this->addEndpoint('/sti-screening');
    }
}
