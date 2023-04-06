<?php

namespace Clinect\NextGen\Requests\Charts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllChart extends Request
{
    protected Method $method = Method::GET;


    public function resolveEndpoint(): string
    {
        return "/chart";
    }
}
