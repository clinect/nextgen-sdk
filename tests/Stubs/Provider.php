<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Provider
{
    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/providers" => MockResponse::make($this->all(), 200),
            ],
        ];

        return new MockClient($response);
    }


    protected function fixtureClient(): MockClient
    {
        $response = [
            ...$this->apiAuthorize(),
            ...[
                "{$this->apiUrl()}/providers" => MockResponse::fixture('Provider/providers'),
                "{$this->apiUrl()}/providers/1" => MockResponse::fixture('Provider/provider'),
                "{$this->apiUrl()}/providers/1/approval-queue" => MockResponse::fixture('Provider/ApprovalQueue/approvalQueues'),
                "{$this->apiUrl()}/providers/1/approval-queue-history" => MockResponse::fixture('Provider/ApprovalQueue/history'),
                "{$this->apiUrl()}/providers/1/approval-queue/1" => MockResponse::fixture('Provider/ApprovalQueue/approvalQueue'),
                "{$this->apiUrl()}/providers/1/approval-queue/1/comments" => MockResponse::fixture('Provider/ApprovalQueue/comments'),
                "{$this->apiUrl()}/providers/1/diagnosis-categories" => MockResponse::fixture('Provider/diagnosisCategories'),
                "{$this->apiUrl()}/providers/1/diagnosis-categories/1/diagnoses" => MockResponse::fixture('Provider/diagnoses'),
                "{$this->apiUrl()}/providers/1/diagnostic-tests" => MockResponse::fixture('Provider/diagnosticTests'),
                "{$this->apiUrl()}/providers/1/dur-reasons" => MockResponse::fixture('Provider/durReasons'),
                "{$this->apiUrl()}/providers/1/encounters" => MockResponse::fixture('Provider/encounters'),
                "{$this->apiUrl()}/providers/1/erx-info" => MockResponse::fixture('Provider/erxInfo'),
                "{$this->apiUrl()}/providers/1/favorites/medication-order-groups" => MockResponse::fixture('Provider/Favorites/medicationOrderGroups'),
                "{$this->apiUrl()}/providers/1/favorites/medication-order-groups/1" => MockResponse::fixture('Provider/Favorites/medicationOrderGroup'),
                "{$this->apiUrl()}/providers/1/favorites/medications" => MockResponse::fixture('Provider/Favorites/medications'),
                "{$this->apiUrl()}/providers/1/favorites/medications/1" => MockResponse::fixture('Provider/Favorites/medication'),
                "{$this->apiUrl()}/providers/1/lab-tests" => MockResponse::fixture('Provider/labTests'),
                "{$this->apiUrl()}/providers/1/medication-refill-requests" => MockResponse::fixture('Provider/medicationRefillRequests'),
                "{$this->apiUrl()}/providers/1/medication-refill-requests/1" => MockResponse::fixture('Provider/medicationRefillRequest'),
            ],
        ];

        return new MockClient($response);
    }

    protected function all(): array
    {
        return [
            [
                'name' => 'provider 1',
            ], [
                'name' => 'provider 2',
            ]
        ];
    }
}
