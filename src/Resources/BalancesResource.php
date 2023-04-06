<?php

namespace Clinect\NextGen\Resources;

use Clinect\NextGen\Requests\Balances\GetPersonAllBalances;
use Clinect\NextGen\Requests\Balances\GetPersonBalance;
use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;

class BalancesResource extends Resource
{
    public function all(int|string $patientId = null): Response
    {
        return $this->connector->send(new GetPersonAllBalances($patientId));
    }
    public function find(int|string $patientId = null, int|string $balanceId = null): Response
    {
        return $this->connector->send(new GetPersonBalance($patientId, $balanceId));
    }
}
