<?php

namespace Clinect\NextGen\Resources;

use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;
use Clinect\NextGen\Requests\Patients\GetPatientContext;
use Clinect\NextGen\Requests\Patients\SearchPatientWorking;

class PatientsResource extends Resource
{
    public function getPatientContext(int|string $patientId, array $args): Response
    {
        return $this->connector->send(new GetPatientContext($this->connector->practiceId, $patientId, $args));
    }

    public function searchPatientWorking(array $args): Response
    {
        return $this->connector->send(new SearchPatientWorking($this->connector->practiceId, $args));
    }
}
