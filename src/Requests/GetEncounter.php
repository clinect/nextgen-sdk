<?php

namespace Clinect\NextGen\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetEncounter extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $patientId,
        public ?int $encounterId = null
    ) { }

    public function resolveEndpoint(): string
    {
        if (!$this->encounterId) {
            return "/persons/{$this->patientId}/chart/encounters";
        }

        return "/persons/{$this->patientId}/chart/encounters/{$this->encounterId}";
    }
}
