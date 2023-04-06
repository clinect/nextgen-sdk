<?php

namespace Clinect\NextGen\Resources;

use Clinect\NextGen\Requests\HealthHistory\GetAllHealthHistoryForm;
use Clinect\NextGen\Requests\HealthHistory\GetAppointmentAllHealthHistoryForm;
use Clinect\NextGen\Requests\HealthHistory\GetAppointmentHealthHistoryForm;
use Clinect\NextGen\Requests\HealthHistory\GetHealthHistoryForm;
use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;

class HealthHistoryResource extends Resource
{
    public function all(int|string $appointmentId = null, array $args = []): Response
    {
        return !$appointmentId ? $this->connector->send(new GetAllHealthHistoryForm($this->connector->practiceId))
            : $this->connector->send(new GetAppointmentAllHealthHistoryForm($this->connector->practiceId, $appointmentId, $args));
    }

    public function find(int|string $formId, int|string $appointmentId = null, array $args = []): Response
    {
        return !$appointmentId ? $this->connector->send(new GetHealthHistoryForm($this->connector->practiceId, $formId))
            :  $this->connector->send(new GetAppointmentHealthHistoryForm($this->connector->practiceId, $formId, $appointmentId, $args));
    }
}