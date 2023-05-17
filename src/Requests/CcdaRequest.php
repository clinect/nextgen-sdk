<?php

namespace Clinect\NextGen\Requests;

class CcdaRequest extends Request
{
    public function defaultEndpoint(): string
    {
        return '/ccda-requests';
    }
}