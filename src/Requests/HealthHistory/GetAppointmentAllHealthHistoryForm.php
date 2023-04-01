<?php

namespace Clinect\NextGen\Requests\HealthHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAppointmentAllHealthHistoryForm extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $practiceId,
        public int $appointmentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/appointments/{$this->appointmentId}/healthhistoryforms";
    }
}
