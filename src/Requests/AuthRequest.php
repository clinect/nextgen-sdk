<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Request;

class AuthRequest extends Request
{
    public function defaultEndpoint(): string
    {
        return '/nge-oauth/token';
    }
}
