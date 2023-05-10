<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Users
{
    private $apiConnector;
    private $mockConnector;
    private $userId = "14";

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/users" => MockResponse::make($this->all(), 200),

                "{$this->url()}/users/{$this->userId}/approval-queue-actions" => MockResponse::make([
                    'name' => 'approval-queue-actions',
                ], 200),

                "{$this->url()}/users/{$this->userId}/approval-queue-actions/1" => MockResponse::make([
                    'name' => 'approval-queue-actions 1',
                ], 200),

                "{$this->url()}/users/{$this->userId}/approval-queue-custom-rules" => MockResponse::make([
                    'name' => 'approval-queue-custom-rules',
                ], 200),

                "{$this->url()}/users/{$this->userId}/approval-queue-quick-comments" => MockResponse::make([
                    'name' => 'approval-queue-quick-comments',
                ], 200),

                "{$this->url()}/users/{$this->userId}/favorites/diagnoses-groups" => MockResponse::make([
                    'name' => 'favorites diagnoses groups',
                ], 200),

                "{$this->url()}/users/{$this->userId}/favorites/diagnoses-groups/1" => MockResponse::make([
                    'name' => 'favorites diagnoses group 1',
                ], 200),

                "{$this->url()}/users/{$this->userId}/favorites/diagnoses-groups/1/diagnoses" => MockResponse::make([
                    'name' => 'favorites diagnoses group diagnoses',
                ], 200),

                "{$this->url()}/users/{$this->userId}/favorites/procedures" => MockResponse::make([
                    'name' => 'favorites procedures',
                ], 200),

                "{$this->url()}/users/{$this->userId}/phrases" => MockResponse::make([
                    'name' => 'phrases',
                ], 200),

                "{$this->url()}/users/lookup" => MockResponse::make([
                    'name' => 'lookup',
                ], 200),

                "{$this->url()}/users/{$this->userId}/task-sets" => MockResponse::make([
                    'name' => 'task-sets',
                ], 200),

                "{$this->url()}/users/{$this->userId}/task-sets/1/tasks" => MockResponse::make([
                    'name' => 'task-set tasks',
                ], 200),

                "{$this->url()}/users/{$this->userId}/tasks" => MockResponse::make([
                    'name' => 'tasks',
                ], 200),

                "{$this->url()}/users/{$this->userId}/tasks/1" => MockResponse::make([
                    'name' => 'task 1',
                ], 200),

                "{$this->url()}/users/{$this->userId}/tasks/1/assignees" => MockResponse::make([
                    'name' => 'task assignees',
                ], 200),

                "{$this->url()}/users/{$this->userId}/tasks/1/assignees/1" => MockResponse::make([
                    'name' => 'task assignee 1',
                ], 200),

                "{$this->url()}/users/{$this->userId}/tasks/favorite-assignees" => MockResponse::make([
                    'name' => 'task favorite-assignees',
                ], 200),
            ],
        ];

        return new MockClient($response);
    }


    protected function fixtureClient(): MockClient
    {
        $response = [
            ...[
                ...$this->apiAuthorize(),
                "{$this->apiUrl()}/users" => MockResponse::fixture('Users/users'),
                "{$this->apiUrl()}/users/{$this->userId}/api-access" => MockResponse::fixture('Users/apiAccess'),
                "{$this->apiUrl()}/users/{$this->userId}/appointment-status-colors" => MockResponse::fixture('Users/appointmentStatusColors'),
                "{$this->apiUrl()}/users/{$this->userId}/approval-queue-actions" => MockResponse::fixture('Users/ApprovalQueue/actions'),
                "{$this->apiUrl()}/users/{$this->userId}/approval-queue-actions/1" => MockResponse::fixture('Users/ApprovalQueue/action'),
                "{$this->apiUrl()}/users/{$this->userId}/approval-queue-custom-rules" => MockResponse::fixture('Users/ApprovalQueue/customRules'),
                "{$this->apiUrl()}/users/{$this->userId}/approval-queue-quick-comments" => MockResponse::fixture('Users/ApprovalQueue/quickComments'),
                "{$this->apiUrl()}/users/{$this->userId}/apps" => MockResponse::fixture('Users/apps'),
                "{$this->apiUrl()}/users/{$this->userId}/enterprises" => MockResponse::fixture('Users/enterprises'),
                "{$this->apiUrl()}/users/{$this->userId}/favorites/diagnoses-groups" => MockResponse::fixture('Users/Favorites/diagnosesGroups'),
                "{$this->apiUrl()}/users/{$this->userId}/favorites/diagnoses-groups/1" => MockResponse::fixture('Users/Favorites/diagnosesGroup'),
                "{$this->apiUrl()}/users/{$this->userId}/favorites/diagnoses-groups/1/diagnoses" => MockResponse::fixture('Users/Favorites/diagnoses'),
                "{$this->apiUrl()}/users/{$this->userId}/favorites/procedures" => MockResponse::fixture('Users/Favorites/procedures'),
                "{$this->apiUrl()}/users/{$this->userId}/groups" => MockResponse::fixture('Users/groups'),
                "{$this->apiUrl()}/users/{$this->userId}/locations" => MockResponse::fixture('Users/locations'),
                "{$this->apiUrl()}/users/{$this->userId}/login-defaults" => MockResponse::fixture('Users/loginDefaults'),
                "{$this->apiUrl()}/users/{$this->userId}/options" => MockResponse::fixture('Users/options'),
                "{$this->apiUrl()}/users/{$this->userId}/permissions" => MockResponse::fixture('Users/permissions'),
                "{$this->apiUrl()}/users/{$this->userId}/phrases" => MockResponse::fixture('Users/phrases'),
                "{$this->apiUrl()}/users/{$this->userId}/practices" => MockResponse::fixture('Users/practices'),
                "{$this->apiUrl()}/users/{$this->userId}/provider-relationships" => MockResponse::fixture('Users/providerRelationships'),
                "{$this->apiUrl()}/users/{$this->userId}/providers" => MockResponse::fixture('Users/providers'),
                "{$this->apiUrl()}/users/lookup" => MockResponse::fixture('Users/lookup'),
                "{$this->apiUrl()}/users/{$this->userId}/task-sets" => MockResponse::fixture('Users/Tasks/set'),
                "{$this->apiUrl()}/users/{$this->userId}/task-sets/1/tasks" => MockResponse::fixture('Users/Tasks/setsTasks'),
                "{$this->apiUrl()}/users/{$this->userId}/tasks" => MockResponse::fixture('Users/Tasks/tasks'),
                "{$this->apiUrl()}/users/{$this->userId}/tasks/1" => MockResponse::fixture('Users/Tasks/task'),
                "{$this->apiUrl()}/users/{$this->userId}/tasks/1/assignees" => MockResponse::fixture('Users/Tasks/assignees'),
                "{$this->apiUrl()}/users/{$this->userId}/tasks/1/assignees/1" => MockResponse::fixture('Users/Tasks/assignee'),
                "{$this->apiUrl()}/users/{$this->userId}/tasks/favorite-assignees" => MockResponse::fixture('Users/Tasks/favoriteAssignees'),
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
