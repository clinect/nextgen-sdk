<?php

namespace Clinect\NextGen\Requests\Persons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SearchPerson extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public array $args = []
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
