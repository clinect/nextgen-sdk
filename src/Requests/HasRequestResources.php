<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Resources\AppointmentsResource;
use Clinect\NextGen\Resources\PersonsResource;
use Clinect\NextGen\Resources\PatientsResource;
use Clinect\NextGen\Resources\DepartmentsResource;
use Clinect\NextGen\Resources\HealthHistoryResource;

trait HasRequestResources
{
    public function patient(): PatientsResource
    {
        return new PatientsResource($this);
    }

    public function person(): PersonsResource
    {
        return new PersonsResource($this);
    }

    public function departments(): DepartmentsResource
    {
        return new DepartmentsResource($this);
    }

    public function appointments(): AppointmentsResource
    {
        return new AppointmentsResource($this);
    }

    public function healthHistory(): HealthHistoryResource
    {
        return new HealthHistoryResource($this);
    }
}