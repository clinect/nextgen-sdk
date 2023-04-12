<?php

namespace Clinect\NextGen\Requests\BaseRequests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Repositories\Body\FormBodyRepository;
use Saloon\Repositories\Body\JsonBodyRepository;
use Saloon\Repositories\Body\MultipartBodyRepository;
use Saloon\Contracts\Body\HasBody as HasBodyContract;

class FormRequest extends Request implements HasBodyContract
{
    protected FormBodyRepository|JsonBodyRepository|MultipartBodyRepository $body;

    public function __construct(
        protected Method $method = Method::POST,
        public string $endpoint,
        public array $_headers = [],
        public array $queries = [],
        public array $configs = [],
        public array $data = [],
        public string $typeBody = 'form'
    ) {
    }

    public function resolveEndpoint(): string
    {
        return $this->endpoint;
    }

    protected function defaultHeaders(): array
    {
        return $this->_headers;
    }

    protected function defaultQuery(): array
    {
        return $this->queries;
    }

    protected function defaultConfig(): array
    {
        return $this->configs;
    }

    public function body(): FormBodyRepository|JsonBodyRepository|MultipartBodyRepository
    {
        return match ($this->typeBody) {
            'form' => new FormBodyRepository($this->defaultBody()),
            'json' => new JsonBodyRepository($this->defaultBody()),
            'multipart' => new MultipartBodyRepository($this->defaultBody()),
            default => $this->data,
        };
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
