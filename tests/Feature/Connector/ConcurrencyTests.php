<?php

namespace Clinect\NextGen\Tests\Feature\Connector;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Saloon\Exceptions\Request\RequestException;
use Clinect\NextGen\Tests\Stubs\Person as PersonStub;
use Saloon\Contracts\Response;
use Saloon\Exceptions\Request\FatalRequestException;

class ConcurrencyTests extends TestCase
{
    use PersonStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
    }

    public function testConcurrencyAndPoolRequests()
    {
        $pool = $this->apiConnector->pool(
            requests: [
                $this->apiConnector->disableCaching()->persons($this->personId)->get(),
                $this->apiConnector->disableCaching()->persons($this->personId)->appointments()->get(),
                $this->apiConnector->disableCaching()->persons($this->personId)->eligibilities()->get(),
                $this->apiConnector->disableCaching()->persons($this->personId)->ethnicities()->get(),
                $this->apiConnector->disableCaching()->persons($this->personId)->races()->get(),
            ],
            concurrency: 3,
            responseHandler: function (Response $response) {
                $this->assertSame($response->status(), 200);
                $this->assertNotEmpty($response->json());
             },
            exceptionHandler: function (FatalRequestException|RequestException $exception) {
                $this->fail('Exception: '. $exception->getMessage());
            },
        );

        $promise = $pool->send();
        $promise->wait();
    }
}
