<?php

namespace Clinect\NextGen\Requests;

abstract class Request
{
    use Concerns\HasUsing;
    use Concerns\HasMethods;

    public string $endpoint = '';

    public array $headers = [];

    public array $queries = [];

    public array $configs = [];

    public array $data = [];

    public bool $isCache = false;

    public string $typeBody = 'form';

    public int|string|null $practiceId = null;

    public function addEndpoint(string $endpoint, string $separator = '/'): static
    {
        $this->endpoint = rtrim($this->endpoint, '/')."{$separator}".ltrim($endpoint, '/');

        return $this;
    }

    public function withUriParamId(int|string|null $id = null): static
    {
        if (!is_null($id) || (is_string($id) && strlen($id) > 0)) {
            $this->endpoint = rtrim($this->endpoint, '/')."/".$id;
        }

        return $this;
    }

    public function withHeaders(array $headers): static
    {
        $this->headers = [...$this->headers, ...$headers];

        return $this;
    }

    public function withQuery(array $queries): static
    {
        $this->queries = [...$this->queries, ...$queries];

        return $this;
    }

    public function withConfig(array $configs): static
    {
        $this->configs = [...$this->configs, ...$configs];

        return $this;
    }

    public function withTokenAuth(string $token, string $prefix = 'Bearer'): static
    {
        return $this->withHeaders(['Authorization' => "{$prefix} {$token}"]);
    }

    public function fill(array $data = []): static
    {
        $this->data = $data;

        return $this;
    }

    abstract public function defaultEndpoint(): string;

    protected function cleanUpEndpoint(): void
    {
        if (!empty(filter_var($this->defaultEndpoint(), FILTER_VALIDATE_URL))) {
            $this->endpoint = $this->defaultEndpoint();
            return;
        }

        $endpoint = rtrim($this->defaultEndpoint(), '/') . rtrim($this->endpoint, '/');

        if (!is_null($this->practiceId) || (is_string($this->practiceId) && strlen($this->practiceId) > 0)) {
            $endpoint =  "/{$this->practiceId}/{$endpoint}";
        }

        $this->endpoint = str_replace('//', '/', $endpoint);
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

    public static function getEndpoint(): string
    {
        return call_user_func([new static, 'defaultEndpoint']);
    }
}
