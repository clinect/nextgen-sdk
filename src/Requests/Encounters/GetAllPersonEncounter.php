<?php

namespace Clinect\NextGen\Requests\Encounters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllPersonEncounter extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int|string $patientId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/chart/encounters";
    }
}
