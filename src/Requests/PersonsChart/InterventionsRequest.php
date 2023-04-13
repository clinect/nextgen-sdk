<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class InterventionsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/interventions';
    }

    public function outcomes(int|string|null $id = null): static
    {
        return $this->addEndpoint('/outcomes')->withUriParamId($id);
    }
}