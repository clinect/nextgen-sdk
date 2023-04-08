<?php

namespace Clinect\NextGen\Requests;

class PatientRequests extends Request
{
    public function __construct(
        public int|string|null $id = null,
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/patients';
    }

    public function search(array $queries): \Saloon\Http\Request
    {
        return $this->addEndpoint('/search')->withQuery($queries)->get();
    }
}
