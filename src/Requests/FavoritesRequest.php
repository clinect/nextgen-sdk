<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Favorites\MedicationsRequest;
use Clinect\NextGen\Requests\Favorites\DiagnosesGroupsRequest;

class FavoritesRequest extends Request
{
    public function __construct(
        public string $endPoint = '',
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/favorites';
    }

    public function medications(int|string|null $id): MedicationsRequest
    {
        $this->cleanUpEndpoint();
        return new MedicationsRequest($this->endpoint, $id);
    }

    public function diagnosesGroups(int|string|null $id = null): DiagnosesGroupsRequest
    {
        $this->cleanUpEndpoint();
        return new DiagnosesGroupsRequest($this->endpoint, $id);
    }

    public function procedures()
    {
        return $this->addEndpoint('/procedures');
    }
}
