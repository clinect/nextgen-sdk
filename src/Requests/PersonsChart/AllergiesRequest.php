<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class AllergiesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/allergies';
    }

    public function durCheck(): static
    {
        return $this->addEndpoint('/dur-check');
    }

    public function reactions(): static
    {
        return $this->addEndpoint('/reactions');
    }
}
