<?php

namespace Clinect\NextGen\Requests;

class MasterRequest extends Request
{
    public function defaultEndpoint(): string
    {
        return '/master';
    }

    public function payers(int|string|null $id = null): static
    {
        return $this->addEndpoint('/payers')->withUriParamId($id);
    }
}