<?php

namespace Clinect\NextGen\Tests\Feature\Requests\Persons;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Requests\PersonsRequest;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class ChartTests extends TestCase
{
    use PersonStub;

    public function testCanSeePersonAllCharts()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /persons/{$personId}/chart
        $request = (new PersonsRequest('person-id'))->chart()->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->charts()[$key]['name'], $result['name']);
            $this->assertSame($this->charts()[$key]['category'], $result['category']);
        }
    }
}
