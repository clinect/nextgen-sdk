<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class MedicationRenewalRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/medication-renewal-requests';
    }

    public function medications(): static
    {
        return $this->addEndpoint('/medications');
    }

    public function status(): static
    {
        return $this->addEndpoint('/status');
    }
}
