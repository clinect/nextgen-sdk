<?php

namespace Clinect\NextGen\Tests\Feature\Connector\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Tests\Feature\TestCase;
use Clinect\NextGen\Tests\Stubs\HealthHistoryForm as HealthHistoryFormStub;

class HealthHistoryFormTests extends TestCase
{
    use HealthHistoryFormStub;

    public function testCanSeeAllHealthHistoryForms()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /{$practiceId}/healthhistoryforms
        $request = $connector->healthHistoryForms()->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->all()[$key]['name'], $result['name']);
            $this->assertSame($this->all()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeHealthHistoryForm()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /{$practiceId}/healthhistoryforms/{$healthHistoryFormId}
        $request = $connector->healthHistoryForms('id-3')->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Health history 3');
        $this->assertSame($response->json('category'), 'health-history-3');
    }

    public function testHealthHistoryFormNotFound()
    {
        $connector = new NextGen($this->config());

        $connector->withMockClient($this->client($this->testBaseUrl));

        // Endpoint: /{$practiceId}/healthhistoryforms/{$healthHistoryFormId}
        $request = $connector->healthHistoryForms('id-4')->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
