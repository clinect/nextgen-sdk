<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class PayersRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/payers';
    }

    public function copays(int|string|null $id = null): CopaysRequest
    {
        $this->withUriParamId($this->id);
        $this->cleanUpEndpoint();
        return new CopaysRequest($this->endpoint, $id);
    }
}
