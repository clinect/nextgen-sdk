<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class DocumentFieldsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/document-fields';
    }

    public function picklistItems()
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/picklist-items');
    }
}
