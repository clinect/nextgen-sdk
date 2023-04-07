<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\BaseRequests\SearchRequest;

class Patient extends Request
{
    //includes practiceId
    public function __construct(
        public int|string|null $id = null,
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/patients';
    }
    
    public function search(array $queries)
    {
        return new SearchRequest('/patients/search', $queries, $this->configs);
    }
}
