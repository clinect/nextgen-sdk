<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Financial\GuarantorsRequest;

class FinancialRequest extends Request
{
    public function defaultEndpoint(): string
    {
        return '/financial';
    }

    public function batches(int|string|null $id = null): static
    {
        return $this->addEndpoint('/cards')->withUriParamId($id);
    }

    public function guarantors(int|string|null $id): GuarantorsRequest
    {
        $this->cleanUpEndpoint();
        return new GuarantorsRequest($this->endpoint, $id);
    }

    public function transactions(int|string|null $id = null): static
    {
        return $this->addEndpoint('/transactions')->withUriParamId($id);
    }
}
