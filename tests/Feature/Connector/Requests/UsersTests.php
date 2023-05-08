<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Users as UserStub;

class UsersTests extends TestCase
{
    use UserStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanGetUsers()
    {
        $request = $this->apiConnector->disableCaching()
            ->users()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        $this->assertNotEmpty($response->json()['items']);
    }

    public function testCanGetUserApiAccess()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->apiAccess()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame((string)$response->json('id'), $this->userId);
    }

    public function testCanGetUserAppointmentStatusColors()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->appointmentStatusColors()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
    }

    public function testCanGetUserApprovalQueueActions()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->approvalQueueActions()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'approval-queue-actions');
    }

    public function testCanGetUserApprovalQueueAction()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->approvalQueueActions(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'approval-queue-actions 1');
    }

    public function testCanGetUserApprovalQueueCustomRules()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->approvalQueueCustomRules()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'approval-queue-custom-rules');
    }

    public function testCanGetUserApprovalQueueQuickComments()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->approvalQueueQuickComments()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'approval-queue-quick-comments');
    }

    public function testCanGetUserApps()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->apps()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetUserEnterprises()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->enterprises()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetUserFavoritesDiagnosesGroups()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->favorites()->diagnosesGroups()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'favorites diagnoses groups');
    }

    public function testCanGetUserFavoritesDiagnosesGroup()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->favorites()->diagnosesGroups(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'favorites diagnoses group 1');
    }

    public function testCanGetUserFavoritesDiagnosesGroupDiagnoses()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->favorites()->diagnosesGroups(1)->diagnoses()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'favorites diagnoses group diagnoses');
    }

    public function testCanGetUserFavoritesProcedures()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->favorites()->procedures()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'favorites procedures');
    }

    public function testCanGetUserGroups()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->groups()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        foreach ($response->json() as $data) {
            $this->assertSame((string)$data['userId'], $this->userId);
        }
    }

    public function testCanGetUserLocations()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->locations()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        foreach ($response->json()['items'] as $data) {
            $this->assertSame((string)$data['userId'], $this->userId);
        }
    }

    public function testCanGetUserLoginDefaults()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->loginDefaults()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame((string)$response->json()['id'], $this->userId);
    }

    public function testCanGetUserOptions()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->options()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame((string)$response->json()['userId'], $this->userId);
    }

    public function testCanGetUserPermissions()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->permissions()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
    }

    public function testCanGetUserPhrases()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->phrases()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'phrases');
    }

    public function testCanGetUserPractices()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->practices()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        $this->assertNotEmpty($response->json()['items']);
    }

    public function testCanGetUserProviderRelationships()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->providerRelationships()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        foreach ($response->json()['items'] as $data) {
            $this->assertSame((string)$data['userId'], $this->userId);
        }
    }

    public function testCanGetUserProviders()
    {
        $request = $this->apiConnector->disableCaching()->users($this->userId)
            ->providers()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertArrayHasKey('items', $response->json());
        foreach ($response->json()['items']  as $data) {
            $this->assertSame((string)$data['userId'], $this->userId);
        }
    }

    public function testCanGetUserSearch()
    {
        $request = $this->mockConnector->disableCaching()->users()
            ->lookup()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'lookup');
    }

    public function testCanGetUserTaskSets()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->taskSets()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'task-sets');
    }

    public function testCanGetUserTaskSetTasks()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->taskSets(1)->tasks()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'task-set tasks');
    }

    public function testCanGetUserTasks()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->tasks()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'tasks');
    }

    public function testCanGetUserTask()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->tasks(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'task 1');
    }

    public function testCanGetUserTaskAssignees()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->tasks(1)->assignees()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'task assignees');
    }

    public function testCanGetUserTaskAssignee()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->tasks(1)->assignees(1)
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'task assignee 1');
    }

    public function testCanGetUserTasksFaviroteAssignees()
    {
        $request = $this->mockConnector->disableCaching()->users($this->userId)
            ->tasks()->favoriteAssignees()
            ->get();
        $response = $this->mockConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertSame($response->json('name'), 'task favorite-assignees');
    }
}
