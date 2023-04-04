<?php

namespace Clinect\NextGen\Requests\Appointments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllAppointment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/appointments';
    }
}
