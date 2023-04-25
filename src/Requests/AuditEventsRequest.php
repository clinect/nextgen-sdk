<?php

namespace Clinect\NextGen\Requests;

class AuditEventsRequest extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/audit/events';
    }

    public function account(): static
    {
        return $this->addEndpoint('/account');
    }

    public function allergy(): static
    {
        return $this->addEndpoint('/allergy');
    }
    
    public function applicationAccess(): static
    {
        return $this->addEndpoint('/application-access');
    }

    public function dataTrailItems(): static
    {
        return $this->addEndpoint('/data-trail-items');
    }

    public function diagnosis(): static
    {
        return $this->addEndpoint('/diagnosis');
    }

    public function encounter(): static
    {
        return $this->addEndpoint('/encounter');
    }

    public function ics(): static
    {
        return $this->addEndpoint('/ics');
    }

    public function interfaceHoldingTank(): static
    {
        return $this->addEndpoint('/interface-holding-tank');
    }

    public function interoperability(): static
    {
        return $this->addEndpoint('/interoperability');
    }

    public function medication(): static
    {
        return $this->addEndpoint('/medication');
    }

    public function order(): static
    {
        return $this->addEndpoint('/order');
    }

    public function paq(): static
    {
        return $this->addEndpoint('/paq');
    }

    public function patientEducation(): static
    {
        return $this->addEndpoint('/patient-education');
    }

    public function procedure(): static
    {
        return $this->addEndpoint('/procedure');
    }

    public function rosetta(): static
    {
        return $this->addEndpoint('/rosetta');
    }

    public function security(): static
    {
        return $this->addEndpoint('/security');
    }

    public function template(): static
    {
        return $this->addEndpoint('/template');
    }

    public function performance(): static
    {
        return $this->addEndpoint('/performance');
    }
}
