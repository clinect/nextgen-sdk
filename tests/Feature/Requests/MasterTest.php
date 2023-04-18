<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\MasterRequest;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Master as MasterStub;

class MasterTest extends TestCase
{
    use MasterStub;

    public function testCanSeeAllMaster()
    {
        $connector = new NextGen($this->config(), $this->mockClient());

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
        $connector = new NextGen($this->config(), $this->mockClient());

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
        $connector = new NextGen($this->config(), $this->mockClient());

        // Endpoint: /master/payers/{$payersId}
        $request = (new MasterRequest)->payers('id-2')->copays()->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Master Payer 2');
        $this->assertSame($response->json('category'), 'master-payer-2');
    }
}
