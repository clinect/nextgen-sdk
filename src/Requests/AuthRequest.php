<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Request;

class AuthRequest extends Request
{
    public function __construct(
        public string $url
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->url;
    }
}
