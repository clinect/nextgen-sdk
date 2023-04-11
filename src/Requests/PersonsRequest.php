<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Persons\ChartRequest;
use Clinect\NextGen\Requests\Request;

class PersonsRequest extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/persons';
    }

    public function insurances(int|string|null $id = null): static
    {
        return $this->addEndpoint('/insurances')->withUriParamId($id);
    }

    public function cards(int|string|null $id = null): static
    {
        return $this->addEndpoint('/cards')->withUriParamId($id);
    }

    public function back(): static
    {
        return $this->addEndpoint('/back');
    }

    public function front(): static
    {
        return $this->addEndpoint('/front');
    }

    public function search(array $queries): \Saloon\Http\Request
    {
        return $this->addEndpoint('/lookup')->withQuery($queries)->get();
    }

    public function chart(): ChartRequest
    {
        $this->cleanUpEndpoint();
        return new ChartRequest($this->endpoint);
    }
}
