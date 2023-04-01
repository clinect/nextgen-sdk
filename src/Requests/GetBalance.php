<?php

namespace Clinect\NextGen\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetBalance extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public int $id
    ) { }

    public function resolveEndpoint(): string
    {
        return "/persons/{$this->id}/chart/balances";
    }
}
