<?php

namespace Clinect\NextGen\Tests\Stubs;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

trait Provider
{
    private $apiConnector;
    private $mockConnector;
    private $providerId = "27db8c5c-4373-4626-aabf-0095c576497d";
    private $diagnosisCategoryId = "22a2f8c3-f712-4155-b052-e9dfee4b77cb";

    protected function mockClient(): MockClient
    {
        $response = [
            ...$this->mockAuthorize(),
            ...[
                "{$this->url()}/providers" => MockResponse::make($this->all(), 200),

                "{$this->url()}/providers/{$this->providerId}/approval-queue" => MockResponse::make([
                    'name' => 'approval-queue',
                ], 200),

                "{$this->url()}/providers/{$this->providerId}/approval-queue/1" => MockResponse::make([
                    'name' => 'approval-queue 1',
                ], 200),

                "{$this->url()}/providers/{$this->providerId}/approval-queue-history" => MockResponse::make([
                    'name' => 'approval-queue-history',
                ], 200),

                "{$this->url()}/providers/{$this->providerId}/approval-queue/1/comments" => MockResponse::make([
                    'name' => 'approval-queue comments 1',
                ], 200),

                "{$this->url()}/providers/{$this->providerId}/erx-info" => MockResponse::make([
                    'name' => 'erx-info',
                ], 200),

                "{$this->url()}/providers/{$this->providerId}/favorites/medication-order-groups" => MockResponse::make([
                    'name' => 'favorites medication-order-groups',
                ], 200),

                "{$this->url()}/providers/{$this->providerId}/favorites/medication-order-groups/1" => MockResponse::make([
                    'name' => 'favorites medication-order-groups 1',
                ], 200),

                "{$this->url()}/providers/{$this->providerId}/favorites/medications" => MockResponse::make([
                    'name' => 'favorites medications',
                ], 200),

                "{$this->url()}/providers/{$this->providerId}/favorites/medications/1" => MockResponse::make([
                    'name' => 'favorites medication 1',
                ], 200),

                "{$this->url()}/providers/{$this->providerId}/medication-refill-requests/1" => MockResponse::make([
                    'name' => 'medication-refill-requests 1',
                ], 200),

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
                "{$this->apiUrl()}/providers/{$this->providerId}" => MockResponse::fixture('Provider/provider'),
                "{$this->apiUrl()}/providers/{$this->providerId}/approval-queue" => MockResponse::fixture('Provider/ApprovalQueue/approvalQueues'),
                "{$this->apiUrl()}/providers/{$this->providerId}/approval-queue-history" => MockResponse::fixture('Provider/ApprovalQueue/history'),
                "{$this->apiUrl()}/providers/{$this->providerId}/approval-queue/1" => MockResponse::fixture('Provider/ApprovalQueue/approvalQueue'),
                "{$this->apiUrl()}/providers/{$this->providerId}/approval-queue/1/comments" => MockResponse::fixture('Provider/ApprovalQueue/comments'),
                "{$this->apiUrl()}/providers/{$this->providerId}/diagnosis-categories" => MockResponse::fixture('Provider/diagnosisCategories'),
                "{$this->apiUrl()}/providers/{$this->providerId}/diagnosis-categories/{$this->diagnosisCategoryId}/diagnoses" => MockResponse::fixture('Provider/diagnoses'),
                "{$this->apiUrl()}/providers/{$this->providerId}/diagnostic-tests" => MockResponse::fixture('Provider/diagnosticTests'),
                "{$this->apiUrl()}/providers/{$this->providerId}/dur-reasons" => MockResponse::fixture('Provider/durReasons'),
                "{$this->apiUrl()}/providers/{$this->providerId}/encounters" => MockResponse::fixture('Provider/encounters'),
                "{$this->apiUrl()}/providers/{$this->providerId}/erx-info" => MockResponse::fixture('Provider/erxInfo'),
                "{$this->apiUrl()}/providers/{$this->providerId}/favorites/medication-order-groups" => MockResponse::fixture('Provider/Favorites/medicationOrderGroups'),
                "{$this->apiUrl()}/providers/{$this->providerId}/favorites/medication-order-groups/1" => MockResponse::fixture('Provider/Favorites/medicationOrderGroup'),
                "{$this->apiUrl()}/providers/{$this->providerId}/favorites/medications" => MockResponse::fixture('Provider/Favorites/medications'),
                "{$this->apiUrl()}/providers/{$this->providerId}/favorites/medications/1" => MockResponse::fixture('Provider/Favorites/medication'),
                "{$this->apiUrl()}/providers/{$this->providerId}/lab-tests" => MockResponse::fixture('Provider/labTests'),
                "{$this->apiUrl()}/providers/{$this->providerId}/medication-refill-requests" => MockResponse::fixture('Provider/medicationRefillRequests'),
                "{$this->apiUrl()}/providers/{$this->providerId}/medication-refill-requests/1" => MockResponse::fixture('Provider/medicationRefillRequest'),
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
