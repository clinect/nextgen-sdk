<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class DiagnosticRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/diagnostic';
    }

    public function orders(int|string|null $id = null): OrdersRequest
    {
        $this->cleanUpEndpoint();
        return new OrdersRequest($this->endpoint, $id);
    }
}
