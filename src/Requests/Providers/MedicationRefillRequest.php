<?php

namespace Clinect\NextGen\Requests\Providers;

use Clinect\NextGen\Requests\Request;

class MedicationRefillRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($this->id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/medication-refill-requests';
    }

    public function matchRefills()
    {
        return $this->addEndpoint('/match-refills');
    }

    public function sendRefillResponse()
    {
        return $this->addEndpoint('/send-refill-response');
    }
}
