<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class PracticesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/practices';
    }

    public function diagnosticTests(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/diagnostic-tests');
    }

    public function labTests(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/lab-tests');
    }

    public function locations(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/locations');
    }

    public function options(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/options');
    }

    public function payers(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/payers');
    }
}
