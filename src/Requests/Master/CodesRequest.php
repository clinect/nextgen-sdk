<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class CodesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($this->id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/codes';
    }

    public function icd10(int|string|null $id = null): static
    {
        return $this->addEndpoint('/icd9'.'/'.$id.'/icd10');
    }
}
