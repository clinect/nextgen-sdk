<?php

namespace Clinect\NextGen\Requests;

class DocumentBatchesRequest extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/document-batches';
    }

    public function documents(int|string|null $id = null): static
    {
        return $this->addEndpoint('/documents')->withUriParamId($id);
    }
}
