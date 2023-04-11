<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\Requests\Request;

class EncountersRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    )
    {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/encounters';
    }

    public function allergies(int|string|null $id = null): static
    {
        return $this->addEndpoint('/allergies')->withUriParamId($id);
    }
}
