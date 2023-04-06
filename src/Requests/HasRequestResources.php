<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Resources\PersonsResource;
use Clinect\NextGen\Resources\PatientsResource;
use Clinect\NextGen\Resources\DepartmentsResource;

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
}