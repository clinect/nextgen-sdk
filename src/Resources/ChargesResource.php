<?php

namespace Clinect\NextGen\Resources;

use Clinect\NextGen\Requests\Charges\GetPersonAllCharges;
use Clinect\NextGen\Requests\Charges\GetPersonCharge;
use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;

class ChargesResource extends Resource
{
    public function all(array $args, int|string $patientId = null): Response
    {
        return $this->connector->send(new GetPersonAllCharges($args, $patientId ?: $this->id));
    }
    
    public function find(array $args, int|string $chargeId, int|string $patientId = null): Response
    {
        return $this->connector->send(new GetPersonCharge($args, $patientId ?: $this->id, $chargeId));
    }
}
