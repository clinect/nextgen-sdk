<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class DiagnosesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/diagnoses';
    }

    public function assessments(): static
    {
        return $this->addEndpoint('/assessments');
    }

    public function interactions(): static
    {
        return $this->addEndpoint('/interactions');
    }
}
