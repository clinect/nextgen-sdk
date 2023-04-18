<?php

namespace Clinect\NextGen\Requests\Persons;

use Clinect\NextGen\Requests\Request;

class CardsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($this->id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/cards';
    }

    public function back()
    {
        return $this->addEndpoint('/back');
    }

    public function front()
    {
        return $this->addEndpoint('/front');
    }
}
