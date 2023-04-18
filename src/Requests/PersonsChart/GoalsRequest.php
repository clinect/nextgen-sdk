<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class GoalsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/goals';
    }

    public function interventions(int|string|null $id = null): InterventionsRequest
    {
        $this->cleanUpEndpoint();
        return new InterventionsRequest($this->endpoint, $id);
    }
}
