<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class ViewCategoriesRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/view-categories';
    }

    public function itemsExternal(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/items-external');
    }

    public function itemsTypes(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/items-types');
    }
}
