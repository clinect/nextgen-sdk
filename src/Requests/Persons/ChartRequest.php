<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\Requests\Request;

class ChartRequest extends Request
{
    public function __construct(
        public string $endPoint
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint.'/chart';
    }

    public function balances(int|string|null $id = null): static
    {
        return $this->addEndpoint('/balances')->withUriParamId($id);
    }

    public function charges(int|string|null $id = null): static
    {
        return $this->addEndpoint('/charges')->withUriParamId($id);
    }
}
