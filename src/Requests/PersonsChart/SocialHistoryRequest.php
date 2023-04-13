<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class SocialHistoryRequest extends Request
{
    public function __construct(
        public string $endPoint,
    ) {
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/social-history';
    }

    public function alcoholAndCaffeine(): static
    {
        return $this->addEndpoint('/alcohol-and-caffeine');
    }

    public function alcoholAndDrugUsage(): static
    {
        return $this->addEndpoint('/alcohol-and-drug-usage');
    }

    public function comments(): static
    {
        return $this->addEndpoint('/comments');
    }

    public function diet(): static
    {
        return $this->addEndpoint('/diet');
    }

    public function employments(): static
    {
        return $this->addEndpoint('/employments');
    }

    public function lifestyle(): static
    {
        return $this->addEndpoint('/lifestyle');
    }

    public function statuses(): static
    {
        return $this->addEndpoint('/statuses');
    }

    public function tobaccoUsage(): static
    {
        return $this->addEndpoint('/tobacco-usage');
    }

    public function vaping(): static
    {
        return $this->addEndpoint('/vaping');
    }
}
