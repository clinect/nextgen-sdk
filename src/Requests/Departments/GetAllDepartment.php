<?php

namespace Clinect\NextGen\Requests\Departments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllDepartment extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $practiceId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/departments";
    }
}
