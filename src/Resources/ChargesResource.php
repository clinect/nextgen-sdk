<?php

namespace Clinect\NextGen\Resources;

use Clinect\NextGen\Requests\Charges\GetAllPersonCharges;
use Clinect\NextGen\Requests\Charges\GetPersonCharges;
use Clinect\NextGen\Requests\Charts\GetChart;
use Clinect\NextGen\Requests\Charts\GetPersonChart;
use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;

class ChargesResource extends Resource
{
    public function all(array $args, int|string $patientId = null): Response
    {
        return $this->connector->send(new GetAllPersonCharges($args, $patientId));
    }
    
    public function find(array $args, int|string $patientId = null,int|string $chargeId = null): Response
    {
        return $this->connector->send(new GetPersonCharges($args, $patientId, $chargeId));
    }
}
