<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class PregnanciesRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/pregnancies';
    }

    public function gravidityParity(): static
    {
        return $this->addEndpoint('/gravidity-parity');
    }

    public function encounters(int|string|null $id = null): EncountersRequest
    {
        $this->cleanUpEndpoint();
        return new EncountersRequest($this->endpoint, $id);
    }

    public function gestationalAge(): static
    {
        return $this->addEndpoint('/gestational-age');
    }

    public function outcomes(int|string|null $id = null): static
    {
        return $this->addEndpoint('/outcomes')->withUriParamId($id);
    }
}
