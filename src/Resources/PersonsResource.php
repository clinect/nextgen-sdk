<?php

namespace Clinect\NextGen\Resources;

use Clinect\NextGen\Requests\HasMockResponses;
use Clinect\NextGen\Requests\Persons\GetAllPersons;
use Clinect\NextGen\Requests\Persons\GetPerson;
use Clinect\NextGen\Requests\Persons\SearchPerson;
use Clinect\NextGen\Resources\Resource;
use Saloon\Contracts\Response;

class PersonsResource extends Resource
{
    use HasMockResponses;

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
}
