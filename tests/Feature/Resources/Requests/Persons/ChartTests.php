<?php

namespace Clinect\NextGen\Tests\Feature\Resources\Requests\Persons;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;

class ChartTests extends TestCase
{
    use PersonStub;

    public function testCanSeeAllCharges()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        $request = $connector->persons('person-id')->charts()->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->charts()[$key]['name'], $result['name']);
            $this->assertSame($this->charts()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeCharge()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        $request = $connector->persons('person-id')->charts('id-3')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Person chart 3');
        $this->assertSame($response->json('category'), 'person-chart-3');
    }

    public function testChargeNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        $request = $connector->persons('person-id')->charts('id-4')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
