<?php

namespace Clinect\NextGen\Requests;

class CoreRequest extends Request
{
    public function defaultEndpoint(): string
    {
        return '/core';
    }

    public function version(): static
    {
        return $this->addEndpoint('/version');
    }
}
