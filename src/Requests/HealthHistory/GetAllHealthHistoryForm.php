<?php

namespace Clinect\NextGenSdk\Requests\HealthHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllHealthHistoryForm extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $practiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/healthhistoryforms";
    }
}
