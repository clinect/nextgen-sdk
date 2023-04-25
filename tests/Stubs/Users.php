<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Users
{
    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/users" => MockResponse::make($this->all(), 200),
            ],
        ];

        return new MockClient($response);
    }


    protected function fixtureClient(): MockClient
    {
        $response = [
            ...$this->apiAuthorize(),
            ...[
                "{$this->apiUrl()}/users" => MockResponse::fixture('Users/users'),
                "{$this->apiUrl()}/users/1/api-access" => MockResponse::fixture('Users/apiAccess'),
                "{$this->apiUrl()}/users/1/appointment-status-colors" => MockResponse::fixture('Users/appointmentStatusColors'),
                "{$this->apiUrl()}/users/1/approval-queue-actions" => MockResponse::fixture('Users/ApprovalQueue/actions'),
                "{$this->apiUrl()}/users/1/approval-queue-actions/1" => MockResponse::fixture('Users/ApprovalQueue/action'),
                "{$this->apiUrl()}/users/1/approval-queue-custom-rules" => MockResponse::fixture('Users/ApprovalQueue/customRules'),
                "{$this->apiUrl()}/users/1/approval-queue-quick-comments" => MockResponse::fixture('Users/ApprovalQueue/quickComments'),
                "{$this->apiUrl()}/users/1/apps" => MockResponse::fixture('Users/apps'),
                "{$this->apiUrl()}/users/1/enterprises" => MockResponse::fixture('Users/enterprises'),
                "{$this->apiUrl()}/users/1/favorites/diagnoses-groups" => MockResponse::fixture('Users/Favorites/diagnosesGroups'),
                "{$this->apiUrl()}/users/1/favorites/diagnoses-groups/1" => MockResponse::fixture('Users/Favorites/diagnosesGroup'),
                "{$this->apiUrl()}/users/1/favorites/diagnoses-groups/1/diagnoses" => MockResponse::fixture('Users/Favorites/diagnoses'),
                "{$this->apiUrl()}/users/1/favorites/procedures" => MockResponse::fixture('Users/Favorites/procedures'),
                "{$this->apiUrl()}/users/1/groups" => MockResponse::fixture('Users/groups'),
                "{$this->apiUrl()}/users/1/locations" => MockResponse::fixture('Users/locations'),
                "{$this->apiUrl()}/users/1/login-defaults" => MockResponse::fixture('Users/loginDefaults'),
                "{$this->apiUrl()}/users/1/options" => MockResponse::fixture('Users/options'),
                "{$this->apiUrl()}/users/1/permissions" => MockResponse::fixture('Users/permissions'),
                "{$this->apiUrl()}/users/1/phrases" => MockResponse::fixture('Users/phrases'),
                "{$this->apiUrl()}/users/1/practices" => MockResponse::fixture('Users/practices'),
                "{$this->apiUrl()}/users/1/provider-relationships" => MockResponse::fixture('Users/providerRelationships'),
                "{$this->apiUrl()}/users/1/providers" => MockResponse::fixture('Users/providers'),
                "{$this->apiUrl()}/users/lookup" => MockResponse::fixture('Users/lookup'),
                "{$this->apiUrl()}/users/1/task-sets" => MockResponse::fixture('Users/Tasks/set'),
                "{$this->apiUrl()}/users/1/task-sets/1/tasks" => MockResponse::fixture('Users/Tasks/setsTasks'),
                "{$this->apiUrl()}/users/1/tasks" => MockResponse::fixture('Users/Tasks/tasks'),
                "{$this->apiUrl()}/users/1/tasks/1" => MockResponse::fixture('Users/Tasks/task'),
                "{$this->apiUrl()}/users/1/tasks/1/assignees" => MockResponse::fixture('Users/Tasks/assignees'),
                "{$this->apiUrl()}/users/1/tasks/1/assignees/1" => MockResponse::fixture('Users/Tasks/assignee'),
                "{$this->apiUrl()}/users/1/tasks/favorite-assignees" => MockResponse::fixture('Users/Tasks/favoriteAssignees'),
            ],
        ];

        return new MockClient($response);
    }

    protected function all(): array
    {
        return [
            [
                'name' => 'user 1',
            ], [
                'name' => 'user 2',
            ]
        ];
    }
}
