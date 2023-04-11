<?php

namespace Clinect\NextGen\Requests;

class AuthenticationServicesRequest extends Request
{
    public function defaultEndpoint(): string
    {
        return '/auth-services/identrust-mas/send-challenge';
    }
}
