<?php

namespace Clinect\NextGen\Requests\Departments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetDepartment extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int|string $practiceId,
        public int|string $departmentId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/department/{$this->departmentId}";
    }
}
