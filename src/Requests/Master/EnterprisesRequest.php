<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class EnterprisesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/enterprises';
    }

    public function options()
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/options');
    }
}
