<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\Favorites as FavoritesStub;

class FavoritesTests extends TestCase
{
    use FavoritesStub;

    protected function setup(): void
    {
        parent::setup();
        $this->apiConnector = new NextGen($this->apiConfig(), $this->fixtureClient());
        $this->mockConnector = new NextGen($this->mockConfig(), $this->mockClient());
    }

    public function testCanGetFavoritesMedicationCustomDosageOrder()
    {
        $request = $this->apiConnector->disableCaching()
            ->favorites()->medications(1)->customDosageOrders()
            ->get();
        $response = $this->apiConnector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertNotEmpty($response->json());
        $this->assertArrayHasKey('items', $response->json());
    }
}
