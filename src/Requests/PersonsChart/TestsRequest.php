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

    public function suspectedDiagnoses(int|string|null $id = null): static
    {
        return $this->addEndpoint('/suspected-diagnoses')->withUriParamId($id);
    }

    public function orderEntryAnswers(int|string|null $id = null): static
    {
        return $this->addEndpoint('/order-entry-answers')->withUriParamId($id);
    }
}
