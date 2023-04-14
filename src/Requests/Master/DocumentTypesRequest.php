<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class DocumentTypesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/document-types';
    }

    public function fields()
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/fields');
    }
}
