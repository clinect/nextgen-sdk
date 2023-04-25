<?php

namespace Clinect\NextGen\Requests;

class NgSessionRequest extends Request
{
    public function defaultEndpoint(): string
    {
        return '/users/me/login-defaults';
    }
}
