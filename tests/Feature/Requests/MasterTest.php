<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\MasterRequest;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Tests\Stubs\Master as MasterStub;

class MasterTest extends TestCase
{
    use MasterStub;

    public function testCanSeeAllMaster()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /master
        $request = (new MasterRequest)->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->all()[$key]['name'], $result['name']);
            $this->assertSame($this->all()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeAllMasterPayer()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /master/payers
        $request = (new MasterRequest)->payers()->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->all('payer')[$key]['name'], $result['name']);
            $this->assertSame($this->all('payer')[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeMasterPayer()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /master/payers/{$payersId}
        $request = (new MasterRequest)->payers('id-2')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Master Payer 2');
        $this->assertSame($response->json('category'), 'master-payer-2');
    }
}
