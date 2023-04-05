<?php

namespace Clinect\NextGen\Tests\Feature\Requests;

use Clinect\NextGen\DataTransferObjects\Persons\Person;
use Clinect\NextGen\DataTransferObjects\Persons\PersonSearch;
use Clinect\NextGen\NextGenSdk;
use Clinect\NextGen\Requests\Persons\GetAllPersons;
use Clinect\NextGen\Requests\Persons\GetPerson;
use Clinect\NextGen\Requests\Persons\SearchPerson;
use Saloon\Http\Faking\MockClient;
use Orchestra\Testbench\TestCase;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;

class PersonsTest extends TestCase
{
    public function testCanGetAllPersons()
    {
        $successfulRequest = new GetAllPersons();
        $failedRequest = new GetAllPersons();

        $mockClient = new MockClient([
            $patient = $successfulRequest->successfulMockDTOResponse(Person::class, 2),
            $failedRequest->failedMockResponse()
        ]);

        $nextGenSdk = new NextGenSdk();
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->send($successfulRequest);

        $mockClient->assertSent(function (Request $request, Response $response) use ($patient) {
            foreach ($response->dto() as $key => $data) {
                $patientData = $patient->getBody()->all()[$key];

                $this->assertEquals($patientData['id'], $data->external_id);
                $this->assertEquals($patientData['lastName'], $data->lastname);
                $this->assertEquals($patientData['firstName'], $data->firstname);
                $this->assertEquals($patientData['lastName'].', '. $patientData['firstName'], $data->lastfirst);
                $this->assertEquals($patientData['firstName'], $data->preferredname);
                $this->assertEquals($patientData['firstName'], $data->altfirstname);
                $this->assertEquals($patientData['email'], $data->email);
                $this->assertEquals($patientData['cellPhone'], $data->phone_sms);
                $this->assertEquals($patientData['dateOfBirth'], $data->dob);
                $this->assertEquals($patientData['sex'], $data->sex);
                $this->assertEquals($patientData['consenttotext'], $data->consenttotext);
                $this->assertEquals('eng', $data->language);
                $this->assertEquals(false, $data->has_email);
                $this->assertEquals(false, $data->has_phone_sms);
                $this->assertEquals($patientData['contactpreference'], $data->contactpreference);
            }
            return $request instanceof GetAllPersons;
        });

        $response = $nextGenSdk->send($failedRequest);
        $mockClient->assertSent(GetAllPersons::class);
        $this->assertTrue($response->failed());
    }

    public function testCanGetPatient()
    {
        $successfulRequest = new GetPerson(1);
        $failedRequest = new GetPerson(1);

        $mockClient = new MockClient([
            $patient = $successfulRequest->successfulMockDTOResponse(Person::class),
            $failedRequest->failedMockResponse()
        ]);

        $nextGenSdk = new NextGenSdk();
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->send($successfulRequest);

        $mockClient->assertSent(function (Request $request, Response $response) use ($patient) {
            $patientData = json_decode($patient->getBody()->all(), true);
            $data = $response->dto();

            $this->assertEquals($patientData['id'], $data->external_id);
            $this->assertEquals($patientData['lastName'], $data->lastname);
            $this->assertEquals($patientData['firstName'], $data->firstname);
            $this->assertEquals($patientData['lastName'] . ', ' . $patientData['firstName'], $data->lastfirst);
            $this->assertEquals($patientData['firstName'], $data->preferredname);
            $this->assertEquals($patientData['firstName'], $data->altfirstname);
            $this->assertEquals($patientData['email'], $data->email);
            $this->assertEquals($patientData['cellPhone'], $data->phone_sms);
            $this->assertEquals($patientData['dateOfBirth'], $data->dob);
            $this->assertEquals($patientData['sex'], $data->sex);
            $this->assertEquals($patientData['consenttotext'], $data->consenttotext);
            $this->assertEquals('eng', $data->language);
            $this->assertEquals(false, $data->has_email);
            $this->assertEquals(false, $data->has_phone_sms);
            $this->assertEquals($patientData['contactpreference'], $data->contactpreference);
            return $request instanceof GetPerson;
        });

        $response = $nextGenSdk->send($failedRequest);
        $mockClient->assertSent(GetPerson::class);
        $this->assertTrue($response->failed());
    }

    public function testCanSearchPerson()
    {
        $successfulRequest = new SearchPerson([]);
        $failedRequest = new SearchPerson([]);

        $mockClient = new MockClient([
            $patient = $successfulRequest->successfulMockDTOResponse(PersonSearch::class, 2),
            $failedRequest->failedMockResponse()
        ]);

        $nextGenSdk = new NextGenSdk();
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->send($successfulRequest);

        $mockClient->assertSent(function (Request $request, Response $response) use ($patient) {
            foreach ($response->dto() as $key => $data) {
                $patientData = $patient->getBody()->all()[$key];
                $this->assertEquals($patientData['id'], $data->patientid);
                $this->assertEquals($patientData['personNumber'], $data->patientnumber);
                $this->assertEquals($patientData['firstName'], $data->firstname);
                $this->assertEquals($patientData['lastName'], $data->lastname);
                $this->assertEquals($patientData['dateOfBirth'], $data->dob);
            }
            return $request instanceof SearchPerson;
        });

        $response =  $nextGenSdk->send($failedRequest);
        $mockClient->assertSent(SearchPerson::class);
        $this->assertTrue($response->failed());
    }
}
