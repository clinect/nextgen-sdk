<?php

namespace Clinect\NextGen\Requests\Users;

use Clinect\NextGen\Requests\Request;

class TasksSetsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/task-sets';
    }

    public function tasks(int|string|null $id = null)
    {
        $this->withUriParamId($id);
        return $this->addEndpoint('/tasks');
    }
}
