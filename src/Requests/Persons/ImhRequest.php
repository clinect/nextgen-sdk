<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\Requests\Request;

class ImhRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($this->id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/imh-forms/requests';
    }

    public function status(): static
    {
        return $this->addEndpoint('/status');
    }
}
