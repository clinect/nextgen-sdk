<?php

namespace Clinect\NextGen\Resources;

use Saloon\Contracts\Response;
use Clinect\NextGen\Resources\Resource;
use Clinect\NextGen\Requests\Persons\GetPerson;
use Clinect\NextGen\Requests\Persons\SearchPerson;
use Clinect\NextGen\Requests\Persons\GetAllPersons;

class PersonsResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAllPersons);
    }

    public function find(int $patientId): Response
    {
        return $this->connector->send(new GetPerson($patientId));
    }

    public function search(array $args): Response
    {
        return $this->connector->send(new SearchPerson($args));
    }

    public function paginate(int $pagePage = 20)
    {
        return $this->connector->paginate(new GetAllPersons, $pagePage);
    }
}
