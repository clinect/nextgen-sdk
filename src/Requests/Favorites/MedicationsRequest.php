<?php

namespace Clinect\NextGen\Requests\Favorites;

use Clinect\NextGen\Requests\Request;

class MedicationsRequest extends Request
{
    public function __construct(
        public int|string|null $id,
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/medications';
    }

    public function customDosageOrders(): static
    {
        return $this->addEndpoint('/custom-dosage-orders');
    }
}