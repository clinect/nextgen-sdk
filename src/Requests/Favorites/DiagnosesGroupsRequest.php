<?php

namespace Clinect\NextGen\Requests\Favorites;

use Clinect\NextGen\Requests\Request;

class DiagnosesGroupsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/diagnoses-groups';
    }

    public function diagnoses()
    {
        return $this->addEndpoint('/diagnoses');
    }
}
