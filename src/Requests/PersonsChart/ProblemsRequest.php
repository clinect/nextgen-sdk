<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class ProblemsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/problems';
    }

    public function interactions(): static
    {
        return $this->addEndpoint('/interactions');
    }

    public function notes(int|string|null $id = null): static
    {
        return $this->addEndpoint('/notes')->withUriParamId($id);
    }
}
