<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class ScreeningToolsRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/screening-tools';
    }

    public function generic(int|string|null $id): static
    {
        return $this->addEndpoint('/generic')->withUriParamId($id);
    }

    public function phq2(int|string|null $sequenceNumber): static
    {
        return $this->addEndpoint('/phq2')->withUriParamId($sequenceNumber);
    }

    public function phq9(int|string|null $sequenceNumber): static
    {
        return $this->addEndpoint('/phq9')->withUriParamId($sequenceNumber);
    }
}
