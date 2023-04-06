<?php

namespace Clinect\NextGen\Resources;

use Clinect\NextGen\Requests\Encounters\GetAllPersonEncounter;
use Clinect\NextGen\Requests\Encounters\GetPersonEncounter;
use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;

class EncounterResource extends Resource
{
    public function all(int|string $patientId = null): Response
    {
        return $this->connector->send(new GetAllPersonEncounter($patientId));
    }

    public function find(int|string $patientId = null, int|string $encounterId = null): Response
    {
        return $this->connector->send(new GetPersonEncounter($patientId, $encounterId));
    }
}
