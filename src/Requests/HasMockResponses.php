<?php

namespace Clinect\NextGen\Requests;

use Saloon\Http\Faking\MockResponse;

trait HasMockResponses
{
    public function successfulMockResponse(): MockResponse
    {
        return MockResponse::make(['success' => 'Mock Response'], 200);
    }

    public function failedMockResponse(): MockResponse
    {
        return MockResponse::make(['error' => 'Server Error'], 500);
    }
}
