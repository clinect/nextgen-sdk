<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Favorites\MedicationsRequest;

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
}
 