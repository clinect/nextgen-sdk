<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class DiagnosesRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/diagnoses';
    }

    public function search(array $queries): \Saloon\Http\Request
    {
        return $this->addEndpoint('/search')->withQuery($queries)->get();
    }
}
