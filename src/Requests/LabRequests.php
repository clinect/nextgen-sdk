<?php

namespace Clinect\NextGen\Requests;

class LabRequests extends Request
{
    public function defaultEndpoint(): string
    {
        return '/lab';
    }

    public function orderTestResults(): static
    {
        return $this->addEndpoint('/order-tests-results');
    }
}
