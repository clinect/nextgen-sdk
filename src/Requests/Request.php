<?php

namespace Clinect\NextGen\Requests;

use Saloon\Http\Request as BaseRequest;
use Clinect\NextGen\Requests\BaseRequests\GetRequest;

abstract class Request
{
    public string $endpoint = '';

    public array $queries = [];

    public array $configs = [];

    public int|string|null $practiceId = null;

    public function addEndpoint(string $endpoint): static
    {
        $this->endpoint = rtrim($this->endpoint, '/')."/".ltrim($endpoint, '/');

        return $this;
    }

    public function withUriParamId(int|string|null $id = null): static
    {
        if (!is_null($id) || (is_string($id) && strlen($id) > 0)) {
            $this->endpoint = rtrim($this->endpoint, '/')."/".$id;
        }

        return $this;
    }

    public function withQuery(array $queries): static
    {
        $this->queries = $queries;

        return $this;
    }

    public function withConfig(array $configs): static
    {
        $this->configs = $configs;

        return $this;
    }

    abstract public function defaultEndpoint(): string;

    protected function cleanUpEndpoint(): void
    {
        $endpoint = rtrim($this->defaultEndpoint(), '/') . rtrim($this->endpoint, '/');

        if (!is_null($this->practiceId) || (is_string($this->practiceId) && strlen($this->practiceId) > 0)) {
            $endpoint =  "/{$this->practiceId}/{$endpoint}";
        }

        $this->endpoint = str_replace('//', '/', $endpoint);
    }

    public function get(): BaseRequest
    {
        $this->cleanUpEndpoint();

        return new GetRequest($this->endpoint, $this->queries, $this->configs);
    }

    public function post()
    {
        //
    }

    public function put()
    {
        //
    }

    protected function setPracticeId(int|string $id): static
    {
        $this->practiceId = $id;

        return $this;
    }

    public function __call($method, $arguments)
    {
        if (in_array($method, ['withPracticeId'])) {
            return call_user_func([$this, 'setPracticeId'], $arguments[0]);
        }
    }

    public static function __callStatic($method, $arguments)
    { 
        if (in_array($method, ['withPracticeId'])) {
            return call_user_func([new static, 'setPracticeId'], $arguments[0]);
        }
    }
}
