<?php

namespace Clinect\NextGen\Resources;

use Clinect\NextGen\Requests\Balances\GetAllPersonBalances;
use Clinect\NextGen\Requests\Balances\GetPersonBalances;
use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;

class BalancesResource extends Resource
{
    public function all(int|string $patientId = null): Response
    {
        return $this->connector->send(new GetAllPersonBalances($patientId));
    }
    public function find(int|string $patientId = null, int|string $balanceId = null): Response
    {
        return $this->connector->send(new GetPersonBalances($patientId, $balanceId));
    }
}
