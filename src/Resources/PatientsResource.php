<?php

namespace Clinect\NextGen\Resources;

use Clinect\NextGen\Requests\HasMockResponses;
use Clinect\NextGen\Requests\Patients\GetPatientContext;
use Clinect\NextGen\Requests\Patients\SearchPatientWorking;
use Clinect\NextGen\Resources\Resource;
use Saloon\Contracts\Response;

class PatientsResource extends Resource
{
    use HasMockResponses;

    public function getPatientContext(int $practiceId, int $patientId, array $args): Response
    {
        return $this->connector->send(new GetPatientContext($practiceId, $patientId, $args));
    }

    public function searchPatientWorking(int $practiceId, array $args): Response
    {
        return $this->connector->send(new SearchPatientWorking($practiceId, $args));
    }
}
