<?php

namespace Clinect\NextGenSdk\Requests\Departments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetDepartment extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $practiceId,
        public int $departmentId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/department/{$this->departmentId}";
    }
}
