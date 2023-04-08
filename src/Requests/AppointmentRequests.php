<?php

namespace Clinect\NextGen\Requests;

class AppointmentRequests extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/appointments';
    }

    public function healthHistoryForms(int|string|null $id = null): static
    {
        return $this->addEndpoint('/healthhistoryforms')->withUriParamId($id);
    }
}
