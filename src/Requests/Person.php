<?php

namespace Clinect\NextGen\Requests;

class Person extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function balances(int|string|null $id = null): static
    {
        return $this->addEndpoint('/chart/balances')->withUriParamId($id);
    }

    public function charges(int|string|null $id = null): static
    {
        return $this->addEndpoint('/chart/charges')->withUriParamId($id);
    }

    public function charts(int|string|null $id = null): static
    {
        return $this->addEndpoint('/chart')->withUriParamId($id);
    }

    public function encounters(int|string|null $id = null): static
    {
        return $this->addEndpoint('/chart/encounters')->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/persons';
    }
}
