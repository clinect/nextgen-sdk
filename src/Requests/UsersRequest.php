<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Users\TasksRequest;
use Clinect\NextGen\Requests\Users\TasksSetsRequest;

class UsersRequest extends Request
{
    public function __construct(
        public int|string|null $id = null
    ) {
    }

    public function defaultEndpoint(): string
    {
        return '/users';
    }

    public function apiAccess(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/api-access');
    }

    public function appointmentStatusColors(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/appointment-status-colors');
    }

    public function approvalQueueActions(int|string|null $actionId = null): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/approval-queue-actions')->withUriParamId($actionId);
    }

    public function approvalQueueCustomRules(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/approval-queue-custom-rules');
    }

    public function approvalQueueQuickComments(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/approval-queue-quick-comments');
    }

    public function apps(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/apps');
    }

    public function enterprises(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/enterprises');
    }

    public function favorites(int|string|null $id = null): FavoritesRequest
    {
        $this->withUriParamId($id);
        return new FavoritesRequest($this->endpoint, $id);
    }

    public function groups(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/groups');
    }

    public function locations(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/locations');
    }

    public function loginDefaults(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/login-defaults');
    }

    public function options(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/options');
    }

    public function permissions(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/permissions');
    }

    public function phrases(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/phrases');
    }

    public function practices(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/practices');
    }

    public function providerRelationships(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/provider-relationships');
    }

    public function providers(): static
    {
        $this->withUriParamId($this->id);
        return $this->addEndpoint('/providers');
    }

    public function lookup(): static
    {
        return $this->addEndpoint('/lookup');
    }

    public function taskSets(int|string|null $id = null): TasksSetsRequest
    {
        $this->withUriParamId($id);
        return new TasksSetsRequest($this->endpoint, $id);
    }

    public function tasks(int|string|null $id = null): TasksRequest
    {
        $this->withUriParamId($id);
        return new TasksRequest($this->endpoint, $id);
    }
}
