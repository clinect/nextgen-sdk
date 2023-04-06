<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Resources\PatientsResource;
use Clinect\NextGen\Resources\PersonsResource;

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
}