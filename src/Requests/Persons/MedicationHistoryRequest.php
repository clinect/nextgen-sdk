<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\Requests\Request;

class MedicationHistoryRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/medication-history';
    }

    public function createConsent(): static
    {
        return $this->addEndpoint('/create-consent');
    }

    public function createRequest(): static
    {
        return $this->addEndpoint('/create-request');
    }
}
