<?php

namespace Clinect\NextGen\Requests\HealthHistory;

use Clinect\NextGen\Requests\HasMockResponses;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetHealthHistoryForm extends Request
{
    use HasMockResponses;
    
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
