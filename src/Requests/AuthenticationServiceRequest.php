<?php

namespace Clinect\NextGen\Requests;

class AuthenticationServiceRequest extends Request
{
    public function defaultEndpoint(): string
    {
        return '/auth-services/identrust-mas/send-challenge';
    }
}
