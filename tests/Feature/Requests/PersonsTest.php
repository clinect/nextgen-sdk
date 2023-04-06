<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\DataTransferObjects\Persons\Person;
use Clinect\NextGen\DataTransferObjects\Persons\PersonSearch;
use Clinect\NextGen\NextGenSdk;
use Clinect\NextGen\Requests\Persons\GetAllPersons;
use Clinect\NextGen\Requests\Persons\GetPerson;
use Clinect\NextGen\Requests\Persons\SearchPerson;
use Saloon\Http\Faking\MockClient;
use Orchestra\Testbench\TestCase;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;

class PersonsTest extends TestCase
{
    public function testCanGetAllPersons()
    {
        $nextGenSdk = new NextGenSdk();

        $mockClient = new MockClient([
            $nextGenSdk->person()->successfulMockResponse(),
            $nextGenSdk->person()->failedMockResponse()
        ]);
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->person()->all();
        $this->assertTrue($response->successful());
        $mockClient->assertSent(GetAllPersons::class);

        $response = $nextGenSdk->person()->all();
        $mockClient->assertSent(GetAllPersons::class);
        $this->assertTrue($response->failed());
    }

    public function testCanGetPatient()
    {
        $nextGenSdk = new NextGenSdk();

        $mockClient = new MockClient([
            $nextGenSdk->person()->successfulMockResponse(),
            $nextGenSdk->person()->failedMockResponse()
        ]);
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->person()->find(1);
        $this->assertTrue($response->successful());
        $mockClient->assertSent(GetPerson::class);

        $response = $nextGenSdk->person()->find(1);
        $mockClient->assertSent(GetPerson::class);
        $this->assertTrue($response->failed());
    }

    public function testCanSearchPerson()
    {
        $nextGenSdk = new NextGenSdk();

        $mockClient = new MockClient([
            $nextGenSdk->person()->successfulMockResponse(),
            $nextGenSdk->person()->failedMockResponse()
        ]);
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->person()->search(['name'=>'test']);
        $this->assertTrue($response->successful());
        $mockClient->assertSent(SearchPerson::class);

        $response = $nextGenSdk->person()->search(['name' => 'test']);
        $mockClient->assertSent(SearchPerson::class);
        $this->assertTrue($response->failed());
    }
}
