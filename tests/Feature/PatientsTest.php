<?php

declare(strict_types=1);

namespace Clinect\NextGen\Tests\Feature;

use Clinect\NextGen\DataTransferObjects\Patient;
use Clinect\NextGen\NextGenSdk;
use Clinect\NextGen\Requests\Patients\GetAllPatients;
use PHPUnit\Framework\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

class PatientsTest extends TestCase
{
    public function testCanGetAllPatients()
    {
        $mockClient = new MockClient([
            MockResponse::make(array(new Patient(
                1,
                null,
                'Test Last Name',
                'Test First Name',
                'Full name',
                'Test',
                'alt test',
                'testemail@gmail.com',
                '123456',
                '11/29/1996',
                'male',
                true,
                'eng',
                false,
                false,
                'contact pref'
            )), 200),
            MockResponse::make(array(new Patient(
                2,
                null,
                'Test Last Name 2',
                'Test First Name 2',
                'Full name 2',
                'Test 2',
                'alt test 2',
                'testemail2@gmail.com',
                '1234562',
                '11/29/1996',
                'male',
                true,
                'eng',
                false,
                false,
                'contact pref'
            )), 200)
        ]);

        $nextGenSdk = new NextGenSdk('url', 'token');
        $nextGenSdk->withMockClient($mockClient);

        $nextGenSdk->send(new GetAllPatients());
        dd($nextGenSdk);
    }
}
