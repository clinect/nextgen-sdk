<?php

namespace Clinect\NextGen\Requests;

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
