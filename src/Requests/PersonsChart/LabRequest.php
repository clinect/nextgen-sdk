<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class LabRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/lab';
    }

    public function orders(int|string|null $id = null): OrdersRequest
    {
        $this->cleanUpEndpoint();
        return new OrdersRequest($this->endpoint, $id);
    }

    public function panels(int|string|null $id = null): PanelsRequest
    {
        $this->cleanUpEndpoint();
        return new PanelsRequest($this->endpoint, $id);
    }

    public function results(): static
    {
        return $this->addEndpoint('/results');
    }
}
