<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class HealthConcernsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/health-concerns';
    }

    public function goals(int|string|null $id = null): GoalsRequest
    {
        $this->cleanUpEndpoint();
        return new GoalsRequest($this->endpoint, $id);
    }

    public function allergies(): static
    {
        return $this->addEndpoint('/allergies');
    }

    public function assessmentScales(): static
    {
        return $this->addEndpoint('/assessment-scales');
    }

    public function encounterDiagnosis(): static
    {
        return $this->addEndpoint('/encounter-diagnosis');
    }

    public function familyHistoriesOrganizer(): static
    {
        return $this->addEndpoint('/family-histories-organizer');
    }

    public function problemObservations(): static
    {
        return $this->addEndpoint('/problem-observations');
    }

    public function socialHistory(): static
    {
        return $this->addEndpoint('/social-history');
    }

    public function tobaccoSmokingUsageStatus(): static
    {
        return $this->addEndpoint('/tobacco-smoking-usage-status');
    }

    public function vitals(): static
    {
        return $this->addEndpoint('/vitals');
    }
}
