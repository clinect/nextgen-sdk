<?php

namespace Clinect\NextGen\Requests\Users;

use Clinect\NextGen\Requests\Request;

class TasksRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/tasks';
    }

    public function assignees(int|string|null $id = null)
    {
        return $this->addEndpoint('/assignees')->withUriParamId($id);
    }

    public function favoriteAssignees()
    {
        return $this->addEndpoint('/favorite-assignees');
    }
}
