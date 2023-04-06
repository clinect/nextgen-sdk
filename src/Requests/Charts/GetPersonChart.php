<?php

namespace Clinect\NextGen\Requests\Charts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPersonChart extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int|string $patientId,
        public int|string $chartId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->patientId}/chart/{$this->chartId}";
    }
}
