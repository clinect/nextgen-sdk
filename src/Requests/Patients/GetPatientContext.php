<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\DataTransferObjects\Patient;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;

class GetPatientContext extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $practiceId,
        public int $patientId,
        public array $args
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/patients/{$this->patientId}";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Patient::fromResponse($response);
    }
}
