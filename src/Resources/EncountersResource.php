<?php

namespace Clinect\NextGen\Resources;

use Clinect\NextGen\Requests\Encounters\GetPersonAllEncounters;
use Clinect\NextGen\Requests\Encounters\GetPersonEncounter;
use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;

class EncountersResource extends Resource
{
    public function all(int|string $patientId = null): Response
    {
        return $this->connector->send(new GetPersonAllEncounters($patientId ?: $this->id));
    }

    public function find(int|string $encounterId, int|string $patientId = null): Response
    {
        return $this->connector->send(new GetPersonEncounter($patientId ?: $this->id, $encounterId));
    }
}
