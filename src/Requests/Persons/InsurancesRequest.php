<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\Requests\Request;

class InsurancesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($this->id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/insurances';
    }

    public function cards(int|string|null $id = null): CardsRequest
    {
        $this->cleanUpEndpoint();
        return new CardsRequest($this->endpoint, $id);
    }
}
