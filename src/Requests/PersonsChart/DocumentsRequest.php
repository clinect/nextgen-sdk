<?php

namespace Clinect\NextGen\Requests\PersonsChart;

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

    public function page(int|string|null $page = null): static
    {
        return $this->addEndpoint('/'.$page);
    }

    public function pdf(): static
    {
        return $this->addEndpoint('/pdf');
    }

    public function plainText(): static
    {
        return $this->addEndpoint('/plain-text');
    }

    public function thumbnail(int|string|null $page): static
    {
        return $this->addEndpoint('/thumbnail')->withUriParamId($page);
    }

    public function xml(): static
    {
        return $this->addEndpoint('/xml');
    }
}
