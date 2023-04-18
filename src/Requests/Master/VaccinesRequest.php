<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class VaccinesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/vaccines';
    }

    public function related(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/related');
    }

    public function vis(int|string|null $visId = null): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/vis')->withUriParamId($visId);
    }
}
