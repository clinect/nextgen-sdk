<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class CarePlanRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/care-plan';
    }
    
    public function healthConcerns(int|string|null $id): HealthConcernsRequest
    {
        $this->cleanUpEndpoint();
        return new HealthConcernsRequest($this->endpoint, $id);
    }
}
