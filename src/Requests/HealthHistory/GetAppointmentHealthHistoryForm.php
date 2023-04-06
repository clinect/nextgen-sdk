<?php

namespace Clinect\NextGen\Requests\HealthHistory;

use Clinect\NextGen\Requests\HasMockResponses;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAppointmentHealthHistoryForm extends Request
{
    use HasMockResponses;
    
    protected Method $method = Method::GET;

    public function __construct(
        public int|string $practiceId,
        public int|string $appointmentId,
        public int|string $formId,
        public array $args,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/appointments/{$this->appointmentId}/healthhistoryforms/{$this->formId}";
    }

    protected function defaultQuery(): array
    {
        return [
            'shownullanswers' => $this->args['shownullanswers']
        ];
    }
}
