<?php

namespace Clinect\NextGen\Requests\Financial;

use Clinect\NextGen\Requests\Request;

class GuarantorsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/guarantors';
    }

    public function account(): static
    {
        return $this->addEndpoint('/account');
    }
}
