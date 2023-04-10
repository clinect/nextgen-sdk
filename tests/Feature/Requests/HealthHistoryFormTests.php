<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Orchestra\Testbench\TestCase;
use Clinect\NextGen\Requests\HealthHistoryFormRequests;
use Clinect\NextGen\Tests\Stubs\HealthHistoryForm as HealthHistoryFormStub;

class HealthHistoryFormTests extends TestCase
{
    use HealthHistoryFormStub;

    public function testCanSeeAllHealthHistoryForms()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /{$practiceId}/healthhistoryforms
        $request = (new HealthHistoryFormRequests)->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);

        foreach ($response->json() as $key => $result) {
            $this->assertSame($this->all()[$key]['name'], $result['name']);
            $this->assertSame($this->all()[$key]['category'], $result['category']);
        }
    }

    public function testCanSeeHealthHistoryForm()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /{$practiceId}/healthhistoryforms/{$healthHistoryFormId}
        $request = (new HealthHistoryFormRequests('id-3'))->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 200);
        $this->assertSame($response->json('name'), 'Health history 3');
        $this->assertSame($response->json('category'), 'health-history-3');
    }

    public function testHealthHistoryFormNotFound()
    {
        $baseUrl = 'test.clinect.com';

        $connector = new NextGen(baseUrl: $baseUrl);

        $connector->withMockClient($this->client($baseUrl));

        // Endpoint: /{$practiceId}/healthhistoryforms/{$healthHistoryFormId}
        $request = (new HealthHistoryFormRequests('id-4'))->withPracticeId('practice-id')->get();

        $response = $connector->send($request);

        $this->assertSame($response->status(), 404);
        $this->assertSame($response->json('error'), 'No data available');
    }
}
