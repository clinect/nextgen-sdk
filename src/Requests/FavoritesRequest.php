<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Favorites\MedicationsRequest;
use Clinect\NextGen\Requests\Users\DiagnosesGroupsRequest;

class FavoritesRequest extends Request
{
    public function defaultEndpoint(): string
    {
        return '/favorites';
    }

    public function medications(int|string|null $id): MedicationsRequest
    {
        $this->cleanUpEndpoint();
        return new MedicationsRequest($this->endpoint, $id);
    }

    public function diagnosesGroups(int|string|null $id): DiagnosesGroupsRequest
    {
        $this->cleanUpEndpoint();
        return new DiagnosesGroupsRequest($this->endpoint, $id);
    }

    public function procedures()
    {
        return $this->addEndpoint('/procedures');
    }
}
 