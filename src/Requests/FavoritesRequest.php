<?php

namespace Clinect\NextGen\Requests;

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
 