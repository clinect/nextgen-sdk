<?php

namespace Clinect\NextGen\Requests\Concerns;

trait HasUsing
{
    public function usingJsonBody(): static
    {
        $this->typeBody = 'json';

        $this->headers = [
            ...$this->headers,
            ...['Content-Type' => 'application/json'],
        ];

        return $this;
    }

    public function usingFormBody(): static
    {
        $this->typeBody = 'form';

        $this->headers = [
            ...$this->headers,
            ...['Content-Type' => 'application/x-www-form-urlencoded'],
        ];

        return $this;
    }

    public function usingMultipartBody(): static
    {
        $this->typeBody = 'multipart';

        $this->headers = [
            ...$this->headers,
            ...['Content-Type' => 'multipart/form-data'],
        ];

        return $this;
    }
}
