<?php

namespace Clinect\NextGen\Tests\Feature\Requests\Persons;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Requests\PersonsRequest;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class EncounterTests extends TestCase
{
    use PersonStub;

    public function testCanSeePersonAllEncounters()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /persons/{$personId}/chart/encounters
        $request = (new PersonsRequest('person-id'))->chart()->encounters()->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->encounters()[$key]['name'], $result['name']);
            $this->assertSame($this->encounters()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeePersonEncounter()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /persons/{$personId}/chart/encounters/{$encounterId}
        $request = (new PersonsRequest('person-id'))->chart()->encounters('id-3')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person encounter 3');
        $this->assertSame($response->json('category'), 'person-encounter-3');
    }

    public function testPersonEncounterNotFound()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /persons/{$personId}/chart/encounters/{$encounterId}
        $request = (new PersonsRequest('person-id'))->chart()->encounters('id-4')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
