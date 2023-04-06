<?php

namespace Clinect\NextGen\Resources;

use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;
use Clinect\NextGen\Requests\Patients\GetPatientContext;
use Clinect\NextGen\Requests\Patients\SearchPatientWorking;

class PatientsResource extends Resource
{
    public function getPatientContext(int $practiceId, int $patientId, array $args): Response
    {
        return $this->connector->send(new GetPatientContext($practiceId, $patientId, $args));
    }

    public function searchPatientWorking(int $practiceId, array $args): Response
    {
        return $this->connector->send(new SearchPatientWorking($practiceId, $args));
    }
}
