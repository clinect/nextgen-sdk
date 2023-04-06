<?php

namespace Clinect\NextGen\Resources;

use Clinect\NextGen\Requests\Charts\GetAllChart;
use Clinect\NextGen\Requests\Charts\GetPersonAllChart;
use Clinect\NextGen\Requests\Charts\GetChart;
use Clinect\NextGen\Requests\Charts\GetPersonChart;
use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;

class ChartsResource extends Resource
{
    public function all(int|string $patientId = null): Response
    {
        return !$patientId ? $this->connector->send(new GetAllChart)
            : $this->connector->send(new GetPersonAllChart($patientId ?: $this->id));
    }

    public function find(int|string $chartId, int|string $patientId = null): Response
    {
        return !$patientId ? $this->connector->send(new GetChart($chartId))
            : $this->connector->send(new GetPersonChart($patientId ?: $this->id, $chartId));
    }
}
