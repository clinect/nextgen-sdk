<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class TasksRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/tasks';
    }

    public function categories(): static
    {
        return $this->addEndpoint('/categories');
    }

    public function priorities(): static
    {
        return $this->addEndpoint('/priorities');
    }

    public function workGroups(int|string|null $id = null): WorkGroupsRequest
    {
        $this->cleanUpEndpoint();
        return new WorkGroupsRequest($this->endpoint, $id);
    }
}
