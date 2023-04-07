<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\BaseRequests\SearchRequest;
use Clinect\NextGen\Requests\Request;

class Person extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/persons';
    }

    public function balances(int|string|null $id = null): static
    {
        return $this->addEndpoint('/chart/balances')->withUriParamId($id);
    }

    public function charges(int|string|null $id = null): static
    {
        return $this->addEndpoint('/chart/charges')->withUriParamId($id);
    }

    public function charts(int|string|null $id = null): static
    {
        return $this->addEndpoint('/chart')->withUriParamId($id);
    }

    public function encounters(int|string|null $id = null): static
    {
        return $this->addEndpoint('/chart/encounters')->withUriParamId($id);
    }

    public function search(array $queries)
    {
        return new SearchRequest('/persons/lookup', $queries, $this->configs);
    }

    public function insurance(int|string|null $id = null): static
    {
        return $this->addEndpoint('/insurance')->withUriParamId($id);
    }

    public function card(int|string|null $id = null): static
    {
        return str_contains($this->endpoint,'insurance') ?
         $this->addEndpoint('/card')->withUriParamId($id) : $this->throw();
    }
}
