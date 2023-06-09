<?php

namespace Clinect\NextGen\Requests\Concerns;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Clinect\NextGen\Requests\BaseRequests\GetRequest;
use Clinect\NextGen\Requests\BaseRequests\FormRequest;

trait HasMethods
{
    public function get(): Request
    {
        $this->cleanUpEndpoint();

        return new GetRequest(
            endpoint: $this->endpoint,
            queries: $this->queries,
            configs: $this->configs
        );
    }

    public function post(): Request
    {
        $this->cleanUpEndpoint();

        return $this->form(Method::POST);
    }

    public function put(): Request
    {
        $this->cleanUpEndpoint();

        return $this->form(Method::PUT);
    }

    public function patch(): Request
    {
        $this->cleanUpEndpoint();

        return $this->form(Method::PATCH);
    }

    public function delete(): Request
    {
        $this->cleanUpEndpoint();

        return $this->form(Method::DELETE);
    }

    public function form(Method $method): Request
    {
        return new FormRequest(
            endpoint: $this->endpoint,
            method: $method,
            _headers: $this->headers,
            queries: $this->queries,
            configs: $this->configs,
            data: $this->data,
            typeBody: $this->typeBody
        );
    }
}
