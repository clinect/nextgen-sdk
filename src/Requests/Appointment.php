<?php

namespace Clinect\NextGen\Requests;

class Appointment extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/appointments';
    }
}
