<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class AppointmentsRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/appointments';
    }

    public function categories(int|string|null $id = null): CategoriesRequest
    {
        $this->cleanUpEndpoint();
        return new CategoriesRequest($this->endpoint, $id);
    }

    public function classes(int|string|null $id = null): ClassesRequest
    {
        $this->cleanUpEndpoint();
        return new ClassesRequest($this->endpoint, $id);
    }
}
