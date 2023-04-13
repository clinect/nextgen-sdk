<?php

namespace Clinect\NextGen\Requests;

class GuarantorsRequest extends Request
{
    public function __construct(
        public int|string|null $id
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/guarantors';
    }

    public function account(): static
    {
        return $this->addEndpoint('/account');
    }
}
