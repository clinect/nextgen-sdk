<?php

namespace Clinect\NextGen\Requests;

use Saloon\Http\Faking\MockResponse;

trait HasMockResponses
{
    public function successfulMockDTOResponse($object, $count = 1): MockResponse
    {
        return MockResponse::make($object::factory($count), 200);
    }

    public function successfulMockResponse(): MockResponse
    {
        return MockResponse::make(['success' => 'Mock Response'], 200);
    }

    public function failedMockResponse(): MockResponse
    {
        return MockResponse::make(['error' => 'Server Error'], 500);
    }
}
