<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests\Persons;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class ChartTests extends TestCase
{
    use PersonStub;

    public function testCanSeePersonAllCharts()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /persons/{$personId}/chart
        $request = $connector->persons('person-id')->chart()->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->charts()[$key]['name'], $result['name']);
            $this->assertSame($this->charts()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeePersonChart()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /persons/{$personId}/chart/{$chartId}
        $request = $connector->persons('person-id')->charts('id-3')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person chart 3');
        $this->assertSame($response->json('category'), 'person-chart-3');
    }

    public function testPersonChartNotFound()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /persons/{$personId}/chart/{$chartId}
        $request = $connector->persons('person-id')->charts('id-4')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
