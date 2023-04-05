<?php

namespace Clinect\NextGen\Requests\Patients;

use Clinect\NextGen\DataTransferObjects\Patients\PatientWorking;
use Clinect\NextGen\Requests\HasMockResponses;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;

class SearchPatientWorking extends Request
{
    use HasMockResponses;
    
    protected Method $method = Method::GET;

    public function __construct(
        public int $practiceId,
        public array $args
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/{$this->practiceId}/patients/search";
    }

    protected function defaultQuery(): array
    {
        return $this->args;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return PatientWorking::fromResponse($response);
    }
}
