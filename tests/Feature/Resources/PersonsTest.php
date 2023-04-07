<?php

namespace Clinect\NextGen\Tests\Feature\Resources;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\Persons\GetAllPersons;
use Clinect\NextGen\Requests\Persons\GetPerson;
use Clinect\NextGen\Requests\Persons\SearchPerson;
use Saloon\Http\Faking\MockClient;
use Orchestra\Testbench\TestCase;

class PersonsTest extends TestCase
{
    public function testCanGetAllPersons()
    {
        $nextGen = new NextGen();

        $mockClient = new MockClient([
            $nextGen->person()->successfulMockResponse(),
            $nextGen->person()->failedMockResponse()
        ]);
        $nextGen->withMockClient($mockClient);

        $response = $nextGen->person()->all();
        $this->assertTrue($response->successful());
        $mockClient->assertSent(GetAllPersons::class);

        $response = $nextGen->person()->all();
        $mockClient->assertSent(GetAllPersons::class);
        $this->assertTrue($response->failed());
    }

    public function testCanGetPatient()
    {
        $nextGen = new NextGen();

        $mockClient = new MockClient([
            $nextGen->person()->successfulMockResponse(),
            $nextGen->person()->failedMockResponse()
        ]);
        $nextGen->withMockClient($mockClient);

        $response = $nextGen->person()->find(1);
        $this->assertTrue($response->successful());
        $mockClient->assertSent(GetPerson::class);

        $response = $nextGen->person()->find(1);
        $mockClient->assertSent(GetPerson::class);
        $this->assertTrue($response->failed());
    }

    public function testCanSearchPerson()
    {
        $nextGen = new NextGen();

        $mockClient = new MockClient([
            $nextGen->person()->successfulMockResponse(),
            $nextGen->person()->failedMockResponse()
        ]);
        $nextGen->withMockClient($mockClient);

        $response = $nextGen->person()->search(['name'=>'test']);
        $this->assertTrue($response->successful());
        $mockClient->assertSent(SearchPerson::class);

        $response = $nextGen->person()->search(['name' => 'test']);
        $mockClient->assertSent(SearchPerson::class);
        $this->assertTrue($response->failed());
    }
}
