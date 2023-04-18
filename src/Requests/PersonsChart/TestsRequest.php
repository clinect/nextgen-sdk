<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class TestsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/tests';
    }

    public function suspectedDiagnoses(): static
    {
        return $this->addEndpoint('/suspected-diagnoses');
    }

    public function orderEntryAnswers(): static
    {
        return $this->addEndpoint('/order-entry-answers');
    }
}
