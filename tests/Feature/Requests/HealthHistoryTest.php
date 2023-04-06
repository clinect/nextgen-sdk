<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\Requests\HealthHistory\GetAllHealthHistoryForm;
use Clinect\NextGen\Requests\HealthHistory\GetAppointmentAllHealthHistoryForm;
use Clinect\NextGen\Requests\HealthHistory\GetAppointmentHealthHistoryForm;
use Clinect\NextGen\Requests\HealthHistory\GetHealthHistoryForm;
use Saloon\Http\Faking\MockClient;
use Orchestra\Testbench\TestCase;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;

class HealthHistoryTest extends TestCase
{
    public function testCanGetAllHealthHistoryForms()
    {
        $successfulRequest = new GetAllHealthHistoryForm(1);
        $failedRequest = new GetAllHealthHistoryForm(1);

        $mockClient = new MockClient([
            $successfulRequest->successfulMockResponse(),
            $failedRequest->failedMockResponse()
        ]);

        $nextGen = new NextGen();
        $nextGen->withMockClient($mockClient);

        $response = $nextGen->send($successfulRequest);

        $mockClient->assertSent(GetAllHealthHistoryForm::class);

        $response = $nextGen->send($failedRequest);
        $mockClient->assertSent(GetAllHealthHistoryForm::class);
        $this->assertTrue($response->failed());
    }

    public function testCanGetHealthHistoryForm()
    {
        $successfulRequest = new GetHealthHistoryForm(1, 1);
        $failedRequest = new GetHealthHistoryForm(1, 1);

        $mockClient = new MockClient([
            $successfulRequest->successfulMockResponse(),
            $failedRequest->failedMockResponse()
        ]);

        $nextGen = new NextGen();
        $nextGen->withMockClient($mockClient);

        $response = $nextGen->send($successfulRequest);

        $mockClient->assertSent(GetHealthHistoryForm::class);

        $response = $nextGen->send($failedRequest);
        $mockClient->assertSent(GetHealthHistoryForm::class);
        $this->assertTrue($response->failed());
    }
    public function testCanGetAppointmentAllHealthHistoryForms()
    {
        $successfulRequest = new GetAppointmentAllHealthHistoryForm(1, 1,['shownullanswers' => true]);
        $failedRequest = new GetAppointmentAllHealthHistoryForm(1, 1, ['shownullanswers' => false]);

        $mockClient = new MockClient([
            $successfulRequest->successfulMockResponse(),
            $failedRequest->failedMockResponse()
        ]);

        $nextGen = new NextGen();
        $nextGen->withMockClient($mockClient);

        $response = $nextGen->send($successfulRequest);
        $mockClient->assertSent(function (Request $request){
            $this->assertTrue($request->query()->all()['shownullanswers']);
            return $request instanceof GetAppointmentAllHealthHistoryForm;
        });

        $response = $nextGen->send($failedRequest);
        $mockClient->assertSent(function (Request $request){
            $this->assertFalse($request->query()->all()['shownullanswers']);
            return $request instanceof GetAppointmentAllHealthHistoryForm;
        });

        $this->assertTrue($response->failed());
    }

    public function testCanGetAppointmentHealthHistoryForm()
    {
        $successfulRequest = new GetAppointmentHealthHistoryForm(1, 1, 1, ['shownullanswers' => true]);
        $failedRequest = new GetAppointmentHealthHistoryForm(1, 1, 1, ['shownullanswers' => false]);

        $mockClient = new MockClient([
            $successfulRequest->successfulMockResponse(),
            $failedRequest->failedMockResponse()
        ]);

        $nextGen = new NextGen();
        $nextGen->withMockClient($mockClient);

        $response = $nextGen->send($successfulRequest);
        $mockClient->assertSent(function (Request $request) {
            $this->assertTrue($request->query()->all()['shownullanswers']);
            return $request instanceof GetAppointmentHealthHistoryForm;
        });

        $response = $nextGen->send($failedRequest);
        $mockClient->assertSent(function (Request $request) {
            $this->assertFalse($request->query()->all()['shownullanswers']);
            return $request instanceof GetAppointmentHealthHistoryForm;
        });

        $this->assertTrue($response->failed());
    }
}
