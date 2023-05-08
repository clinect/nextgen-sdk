<?php

namespace Clinect\NextGen\Requests;

class AppointmentsRequest extends Request
{
    public function __construct(
        public string $endPoint = '',
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/appointments';
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

    public function statusHistories(): static
    {
        return $this->addEndpoint('/status-histories');
    }
}
