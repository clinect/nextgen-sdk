<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class ChartOrdersRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/orders';
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
