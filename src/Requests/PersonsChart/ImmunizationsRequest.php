<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class ImmunizationsRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/immunizations';
    }

    public function doseValidation(): static
    {
        return $this->addEndpoint('/dose-validation');
    }

    public function exclusions(): static
    {
        return $this->addEndpoint('/exclusions');
    }

    public function groupStatus(): static
    {
        return $this->addEndpoint('/group-status');
    }

    public function interactions(): static
    {
        return $this->addEndpoint('/interactions');
    }

    public function orders(int|string|null $id = null): OrdersRequest
    {
        $this->cleanUpEndpoint();
        return new OrdersRequest($this->endpoint, $id);
    }

    public function seriesCompletions(int|string|null $id = null): static
    {
        return $this->addEndpoint('/series-completions')->withUriParamId($id);
    }

}
