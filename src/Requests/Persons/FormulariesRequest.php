<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\Requests\Request;

class FormulariesRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/formularies';
    }

    public function medications(int|string|null $id = null): MedicationsRequest
    {
        $this->cleanUpEndpoint();
        return new MedicationsRequest($this->endpoint, $id);
    }
}
