<?php

namespace Clinect\NextGen\Resources;

use Clinect\NextGen\Requests\Appointments\GetAllAppointment;
use Clinect\NextGen\Requests\Appointments\GetAppointment;
use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;

class AppointmentsResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAllAppointment);
    }

    public function find(int|string $appointmentId): Response
    {
        return $this->connector->send(new GetAppointment($appointmentId));
    }

    public function paginate(int|string $perPage = 20)
    {
        return $this->connector->paginate(new GetAllAppointment, $perPage);
    }

    public function healthHistory(): HealthHistoryResource
    {
        return new HealthHistoryResource($this->connector);
    }
}