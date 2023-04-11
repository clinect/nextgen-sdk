<?php

namespace Clinect\NextGen\Requests;

class AppointmentRequests extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/appointments';
    }

    public function healthHistoryForms(int|string|null $id = null): static
    {
        return $this->addEndpoint('/healthhistoryforms')->withUriParamId($id);
    }

    public function responses(int|string|null $id): static
    {
        return $this->addEndpoint('/responses')->withUriParamId($id);
    }

    public function slots(): static
    {
        return $this->addEndpoint('/slots');
    }

    public function waitlistItems(int|string|null $id = null): static
    {
        return $this->addEndpoint('/waitlist-items')->withUriParamId($id);
    }
}
