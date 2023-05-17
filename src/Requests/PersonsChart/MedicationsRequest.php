<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class MedicationsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/medications';
    }

    public function cancel(): static
    {
        return $this->addEndpoint('/cancel');
    }

    public function dosageRange(): static
    {
        return $this->addEndpoint('/dosage-range');
    }

    public function dosageOrders(): static
    {
        return $this->addEndpoint('/dosage-orders');
    }

    public function notes(int|string|null $id = null): static
    {
        return $this->addEndpoint('/notes')->withUriParamId($id);
    }

    public function durCheck(): static
    {
        return $this->addEndpoint('/dur-check');
    }

    public function monographData(): static
    {
        return $this->addEndpoint('/monograph-data');
    }

    public function patientEducation(): static
    {
        return $this->addEndpoint('/patient-education');
    }

    public function pdmpReport(): static
    {
        return $this->addEndpoint('/pdmp-report');
    }

    public function renew(): static
    {
        return $this->addEndpoint('/renew');
    }

    public function sendErx(): static
    {
        return $this->addEndpoint('/send-erx');
    }

    public function stop(): static
    {
        return $this->addEndpoint('/stop');
    }

    public function durCancel(): static
    {
        return $this->addEndpoint('/dur-cancel');
    }
}
