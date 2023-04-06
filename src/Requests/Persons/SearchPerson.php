<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\DataTransferObjects\Persons\PersonSearch;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;

class SearchPerson extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public array $args
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/lookup";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }
}
