<?php

namespace Clinect\NextGen\Requests\Persons;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use Clinect\NextGen\DataTransferObjects\Persons\Person;

class GetAllPersons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/persons";
    }
}
