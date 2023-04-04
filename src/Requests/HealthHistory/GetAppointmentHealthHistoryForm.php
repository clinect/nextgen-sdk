<?php

namespace Clinect\NextGenSdk\Requests\HealthHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAppointmentHealthHistoryForm extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $practiceId,
        public int $appointmentId,
        public int $formId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/appointments/{$this->appointmentId}/healthhistoryforms/{$this->formId}";
    }
}
