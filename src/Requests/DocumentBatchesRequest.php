<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\DocumentBatches\DocumentsRequest;

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

    public function documents(int|string|null $id = null): DocumentsRequest
    {
        $this->cleanUpEndpoint();
        return new DocumentsRequest($this->endpoint, $id);
    }

    public function documentPages(): static
    {
        return $this->addEndpoint('/document-pages');
    }

    public function postBatch(): static
    {
        return $this->addEndpoint('/post');
    }
}
