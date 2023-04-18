<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\Requests\Request;

class MedicationsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/medications';
    }

    public function alternatives(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/alternatives');
    }

    public function copays(int|string|null $id = null): static
    {
        return $this->addEndpoint('/copays')->withUriParamId($id);
    }

    public function coverages(int|string|null $id = null): static
    {
        return $this->addEndpoint('/coverages')->withUriParamId($id);
    }
}
