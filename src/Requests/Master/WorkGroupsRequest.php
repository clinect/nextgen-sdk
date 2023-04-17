<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class WorkGroupsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/workgroups';
    }

    public function myLists(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/my-lists');
    }

    public function workgroupUsers(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/workgroup-users');
    }
}
