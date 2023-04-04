<?php

namespace Clinect\NextGenSdk\Requests\Charts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetChart extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $chartId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->chartId}";
    }
}
