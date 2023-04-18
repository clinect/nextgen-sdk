<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class EventsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/events';
    }

    public function categories()
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/categories');
    }

    public function locations()
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/locations');
    }

    public function resourceLimits()
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/resource-limits');
    }

    public function resourceOverrides()
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/resource-overrides');
    }

    public function resources()
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/resources');
    }
}
