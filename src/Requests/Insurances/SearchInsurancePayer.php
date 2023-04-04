<?php

namespace Clinect\NextGenSdk\Requests\Insurances;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SearchInsurancePayer extends Request
{
    protected Method $method = Method::GET;
    public array $query_params;

    public function __construct(
        public array $args
    ) {
        $this->query_params = '$filter=substringof(\'' . $args['name'] . '\', name)';
    }

    public function resolveEndpoint(): string
    {
        return "/master/payers";
    }

    protected function defaultQuery(): array
    {
        return $this->query_params;
    }
}
