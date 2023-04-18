<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class ClassesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/classes';
    }

    public function resources(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/resources');
    }
}
