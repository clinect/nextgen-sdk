<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class BulkOrderTestsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/bulk-order-tests';
    }

    public function diagnoses(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/diagnoses');
    }
}
