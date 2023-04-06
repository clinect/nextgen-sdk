<?php

namespace Clinect\NextGen\Requests\Persons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllPersons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/persons";
    }
}
