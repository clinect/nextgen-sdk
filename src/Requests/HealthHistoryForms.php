<?php

namespace Clinect\NextGen\Requests;

class HealthHistoryForms extends Request
{
    public function __construct(
        public int|string|null $id = null,
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/healthhistoryforms';
    }
}
