<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class SpecialtiesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/specialties';
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
}
