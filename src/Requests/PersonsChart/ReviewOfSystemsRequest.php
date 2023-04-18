<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class ReviewOfSystemsRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/review-of-systems';
    }

    public function cardiovascular(): static
    {
        return $this->addEndpoint('/cardiovascular');
    }

    public function constitutional(): static
    {
        return $this->addEndpoint('/constitutional');
    }

    public function enmt(): static
    {
        return $this->addEndpoint('/enmt');
    }

    public function gastrointestinal(): static
    {
        return $this->addEndpoint('/gastrointestinal');
    }

    public function genitourinary(): static
    {
        return $this->addEndpoint('/genitourinary');
    }

    public function immunologic(): static
    {
        return $this->addEndpoint('/immunologic');
    }

    public function musculoskeletal(): static
    {
        return $this->addEndpoint('/musculoskeletal');
    }

    public function respiratory(): static
    {
        return $this->addEndpoint('/respiratory');
    }
}
