<?php

namespace Clinect\NextGen\Requests\HealthHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetHealthHistoryForm extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $practiceId,
        public int $formId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/healthhistoryforms/{$this->formId}";
    }
}
