<?php

namespace Clinect\NextGen\Requests\Providers;

use Clinect\NextGen\Requests\Request;

class FavoritesRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/favorites';
    }

    public function medicationOrderGroups(int|string|null $id = null)
    {
        return $this->addEndpoint('/medication-order-groups')->withUriParamId($id);
    }

    public function medications(int|string|null $id = null)
    {
        return $this->addEndpoint('/medications')->withUriParamId($id);
    }
}
