<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Chart as ChartStub;

class ChartTests extends TestCase
{
    use ChartStub;

    // public function testCanSeeAllCharts()
    // {
    //     $connector = new NextGen($this->config(), $this->mockClient());

    //     // Endpoint: /charts
    //     $request = $connector->charts()->get();

    //     $response = $connector->send($request);

    //     $this->assertSame($response->status(), 200);

    //     foreach ($response->json() as $key => $result) {
    //         $this->assertSame($this->all()[$key]['name'], $result['name']);
    //         $this->assertSame($this->all()[$key]['category'], $result['category']);
    //     }
    // }

    // public function testCanSeeChart()
    // {
    //     $connector = new NextGen($this->config(), $this->mockClient());

    //     // Endpoint: /charts/{$chartId}
    //     $request = $connector->charts('id-3')->get();

    //     $response = $connector->send($request);

    //     $this->assertSame($response->status(), 200);
    //     $this->assertSame($response->json('name'), 'Chart 3');
    //     $this->assertSame($response->json('category'), 'chart-3');
    // }

    // public function testChartNotFound()
    // {
    //     $connector = new NextGen($this->config(), $this->mockClient());

    //     // Endpoint: /charts/{$chartId}
    //     $request = $connector->charts('id-4')->get();

    //     $response = $connector->send($request);

    //     $this->assertSame($response->status(), 404);
    //     $this->assertSame($response->json('error'), 'No data available');
    // }
}
