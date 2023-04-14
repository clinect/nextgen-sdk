<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Request;

class NgSessionRequest extends Request
{
    public function defaultEndpoint(): string
    {
        return '/users/me/login-defaults';
    }
}
