<?php

namespace Clinect\NextGen\Requests\Providers;

use Clinect\NextGen\Requests\Request;

class DiagnosisCategoriesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/diagnosis-categories';
    }

    public function diagnoses()
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/diagnoses');
    }
}
