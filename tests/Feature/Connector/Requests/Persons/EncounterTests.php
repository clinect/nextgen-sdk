<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests\Persons;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class EncounterTests extends TestCase
{
    use PersonStub;

    public function testCanSeePersonAllEncounters()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/chart/encounters
        $request = $connector->persons('person-id')->encounters()->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->encounters()[$key]['name'], $result['name']);
            $this->assertSame($this->encounters()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeePersonEncounter()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/chart/encounters/{$encounterId}
        $request = $connector->persons('person-id')->encounters('id-3')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person encounter 3');
        $this->assertSame($response->json('category'), 'person-encounter-3');
    }

    public function testPersonEncounterNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/chart/encounters/{$encounterId}
        $request = $connector->persons('person-id')->encounters('id-4')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}