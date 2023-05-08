<?php

namespace Clinect\NextGen\Requests\Master;

use Clinect\NextGen\Requests\Request;

class MedicationsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($this->id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/medications';
    }

    public function dosageOrders(): static
    {
        return $this->addEndpoint('/dosage-orders');
    }

    public function fdbDosageOrders(): static
    {
        return $this->addEndpoint('/fdb-dosage-orders');
    }

    public function related(): static
    {
        return $this->addEndpoint('/related');
    }

    public function defaults(): static
    {
        return $this->addEndpoint('/defaults');
    }

    public function dosageReasonOptions(): static
    {
        return $this->addEndpoint('/dosage-reason-options');
    }

    public function refillDenialReasons(): static
    {
        return $this->addEndpoint('/refill-denial-reasons');
    }

    public function rxchangeDenialReasons(): static
    {
        return $this->addEndpoint('/rxchange-denial-reasons');
    }
}
