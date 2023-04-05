<?php

namespace Clinect\NextGen\Tests\Feature;

use Clinect\NextGen\DataTransferObjects\Patients\PatientWorking;
use Clinect\NextGen\DataTransferObjects\Persons\Person;
use Clinect\NextGen\NextGenSdk;
use Clinect\NextGen\Requests\Patients\GetPatientContext;
use Clinect\NextGen\Requests\Patients\SearchPatientWorking;
use Saloon\Http\Faking\MockClient;
use Orchestra\Testbench\TestCase;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;

class PatientsTest extends TestCase
{
    public function testCanGetPatientContext()
    {
        $successfulRequest = new GetPatientContext(1, 1, []);
        $failedRequest = new GetPatientContext(1, 1, []);

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
            return $request instanceof GetPatientContext;
        });

        $response = $nextGenSdk->send($failedRequest);
        $mockClient->assertSent(GetPatientContext::class);
        $this->assertTrue($response->failed());
    }

    public function testCanSearchPatientWorking()
    {
        $successfulRequest = new SearchPatientWorking(1, []);
        $failedRequest = new SearchPatientWorking(1, []);

        $mockClient = new MockClient([
            $patient = $successfulRequest->successfulMockDTOResponse(PatientWorking::class,2),
            $failedRequest->failedMockResponse()
        ]);
        $nextGenSdk = new NextGenSdk();
        $nextGenSdk->withMockClient($mockClient);

        $response = $nextGenSdk->send($successfulRequest);

        $mockClient->assertSent(function (Request $request, Response $response) use ($patient) {
            foreach ($response->dto() as $key => $data) {
                $patientData = $patient->getBody()->all()[$key];

                $firstname = $patientData['firstname'];
                if (isset($patientData['altfirstname'])) {
                    $firstname = $patientData['altfirstname'];
                }
                $this->assertEquals($patientData['patientid'], $data->external_id);
                $this->assertEquals($patientData['patientid'], $data->patientid);
                $this->assertEquals($patientData['lastname'], $data->lastname);
                $this->assertEquals($firstname, $data->firstname);
                $this->assertEquals($patientData['lastname'].', '. $firstname, $data->lastfirst);
                $this->assertEquals($patientData['email'], $data->email);
                $this->assertEquals($patientData['mobilephone'], $data->phone_sms);
                $this->assertEquals($patientData['dob'], $data->dob);
                $this->assertEquals($patientData['consenttotext'], $data->consenttotext);
                $this->assertEquals($patientData['language6392code'], $data->language);
            }
            return $request instanceof SearchPatientWorking;
        });

        $response = $nextGenSdk->send($failedRequest);
        $mockClient->assertSent(SearchPatientWorking::class);
        $this->assertTrue($response->failed());
    }
}
