<?php

namespace Clinect\NextGen\Tests\Feature\Requests\Persons;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Requests\DepartmentRequests;
use Clinect\NextGen\Tests\Stubs\Department as DepartmentStub;

class DepartmentTests extends TestCase
{
    use DepartmentStub;

    public function testCanSeeAllDepartments()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /{$practiceId}/departments
        $request = (new DepartmentRequests)->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->all()[$key]['name'], $result['name']);
            $this->assertSame($this->all()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeDepartment()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /{$practiceId}/departments/{$departmentId}
        $request = (new DepartmentRequests('id-3'))->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Department 3');
        $this->assertSame($response->json('category'), 'department-3');
    }

    public function testDepartmentNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /{$practiceId}/departments/{$departmentId}
        $request = (new DepartmentRequests('department-id'))->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
