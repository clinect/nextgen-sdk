<?php

namespace Clinect\NextGen\Requests;

class ResourcesRequest extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/resources';
    }

    public function appointments(int|string|null $id = null): AppointmentsRequest
    {
        $this->cleanUpEndpoint();
        return new AppointmentsRequest($this->endpoint, $id);
    }
}
