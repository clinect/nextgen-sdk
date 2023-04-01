<?php

namespace Clinect\NextGen\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class Encounter extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $patientId,
        public int $encounterId
    ) { }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/chart/encounters/{$this->encounterId}";
    }
}
