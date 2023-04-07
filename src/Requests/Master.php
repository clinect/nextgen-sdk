<?php

namespace Clinect\NextGen\Requests;

class Master extends Request
{
    public function __construct(
    ) {
    }

    public function defaultEndpoint(): string
    {
        return '/master';
    }

    public function balances(int|string|null $id = null): static
    {
        return $this->addEndpoint('/payers')->withUriParamId($id);
    }
}
