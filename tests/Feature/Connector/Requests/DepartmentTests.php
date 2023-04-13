<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests\Persons;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Department as DepartmentStub;

class DepartmentTests extends TestCase
{
    use DepartmentStub;

    public function testCanSeeAllDepartments()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /{$practiceId}/departments
        $request = $connector->departments()->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->all()[$key]['name'], $result['name']);
            $this->assertSame($this->all()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeDepartment()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /{$practiceId}/departments/{$departmentId}
        $request = $connector->departments('id-3')->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Department 3');
        $this->assertSame($response->json('category'), 'department-3');
    }

    public function testDepartmentNotFound()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /{$practiceId}/departments/{$departmentId}
        $request = $connector->departments('department-id')->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
