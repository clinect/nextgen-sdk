<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class LabTestsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/lab-tests';
    }

    public function components(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/components');
    }

    public function orderEntryQuestions(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/order-entry-questions');
    }
}
