<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class OrdersRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/orders';
    }

    public function insurances(): static
    {
        return $this->addEndpoint('/insurances');
    }

    public function schedule(): static
    {
        return $this->addEndpoint('/schedule');
    }

    public function tests(int|string|null $id = null): TestsRequest
    {
        $this->cleanUpEndpoint();
        return new TestsRequest($this->endpoint, $id);
    }

    public function trackingComments(): static
    {
        return $this->addEndpoint('/tracking-comments');
    }

    public function vaccines(int|string|null $id = null): VaccinesRequest
    {
        $this->cleanUpEndpoint();
        return new VaccinesRequest($this->endpoint, $id);
    }
}
