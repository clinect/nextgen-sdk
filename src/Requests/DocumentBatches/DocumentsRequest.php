<?php

namespace Clinect\NextGen\Requests\DocumentBatches;

use Clinect\NextGen\Requests\Request;

class DocumentsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/documents';
    }

    public function file(): static
    {
        return $this->addEndpoint('/file');
    }
}
