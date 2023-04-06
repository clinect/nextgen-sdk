<?php

namespace Clinect\NextGen\Resources;

use Saloon\Contracts\Connector;
use Clinect\NextGen\Requests\HasMockResponses;

class Resource
{
    use HasMockResponses;

    public function __construct(protected Connector $connector)
    {
        //
    }
}
