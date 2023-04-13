<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class PregnanciesRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/pregnancies';
    }

    public function gravidityParity(): static
    {
        return $this->addEndpoint('/gravidity-parity');
    }
}

