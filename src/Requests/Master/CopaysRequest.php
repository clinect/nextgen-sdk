<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class CopaysRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/copays';
    }

    public function specialties()
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/specialties');
    }
}
