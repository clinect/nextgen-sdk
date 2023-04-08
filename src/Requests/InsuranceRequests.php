<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Request;

class InsuranceRequests extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/insurances';
    }

    public function details(string $href)
    {
        return $this->addEndpoint($href);
    }
}
