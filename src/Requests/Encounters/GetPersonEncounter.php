<?php

namespace Clinect\NextGen\Requests\Encounters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPersonEncounter extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int|string $patientId,
        public int|string $encounterId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/chart/encounters/{$this->encounterId}";
    }
}
