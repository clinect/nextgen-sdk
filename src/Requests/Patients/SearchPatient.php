<?php

namespace Clinect\NextGenSdk\Requests\Patients;

use Clinect\NextGenSdk\DataTransferObjects\PatientSearch;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;

class SearchPatient extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public array $args
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/persons/lookup";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return PatientSearch::fromResponse($response);
    }
}
