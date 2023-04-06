<?php

namespace Clinect\NextGen\Resources;

use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;
use Clinect\NextGen\Requests\Departments\GetDepartment;
use Clinect\NextGen\Requests\Departments\GetAllDepartment;

class DepartmentsResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(
            new GetAllDepartment($this->connector->practiceId)
        );
    }

    public function find(int|string $id): Response
    {
        return $this->connector->send(
            new GetDepartment($this->connector->practiceId, $id)
        );
    }

    public function paginate(int $perPage = 20): Resource
    {
        return $this->connector->paginate(
            new GetAllDepartment($this->connector->practiceId), $perPage
        );
    }
}
