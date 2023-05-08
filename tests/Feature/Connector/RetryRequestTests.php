<?php

namespace Clinect\NextGen\Tests\Feature\Connector;

use Clinect\NextGen\NextGen;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Clinect\NextGen\Tests\Feature\TestCase;
use Saloon\Exceptions\Request\RequestException;

class RetryRequestTests extends TestCase
{
    public function testCanSendAndRetryPersons()
    {
        $mockClient = new MockClient([
            ...$this->mockAuthorize(),
            ...[
                MockResponse::make(['error' => 'Error'], 500),
                MockResponse::make(['name' => 'NextGen'], 200),
            ]
        ]);

        $mockConnector = new NextGen($this->mockConfig(), $mockClient);

        $response = $mockConnector->sendAndRetry($mockConnector->disableCaching()->persons()->get(), 2, 100, function ($exception) {
            if (!$exception instanceof RequestException || $exception->getResponse()->status() !== 500) {
                return false;
            }

            $this->assertSame($exception->getResponse()->status(), 500);
            return true;
        }, throw: false);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json()['name'], 'NextGen');
    }
}
