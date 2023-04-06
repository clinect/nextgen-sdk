<?php

namespace Clinect\NextGen\Requests\Appointments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAppointment extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int|string $appointmentId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentId}";
    }
}
