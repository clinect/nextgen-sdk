<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Requests\PersonRequests;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class PersonTests extends TestCase
{
    use PersonStub;

    public function testCanSeeAllPersons()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons
        $request = (new PersonRequests)->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->persons()[$key]['name'], $result['name']);
            $this->assertSame($this->persons()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeePerson()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}
        $request = (new PersonRequests('id-3'))->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person 3');
        $this->assertSame($response->json('category'), 'person-3');
    }

    public function testPersonNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}
        $request = (new PersonRequests('id-4'))->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }

    public function testCanSearch()
    {

        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        $queryParams = ['filter'  => "",  'skip' => 300, 'orderby' => 'modifyTimestamp'];
        
        // Endpoint: /persons/lookup
        $request = (new PersonRequests)->search($queryParams);

        $response = $connector->send($request);
        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->search()[$key]['name'], $result['name']);
            $this->assertSame($this->search()[$key]['category'], $result['category']);
        }
    }
}
