<?php

namespace Clinect\NextGen\DataTransferObjects\Patients;

use Faker\Factory;
use Saloon\Contracts\Response;

class PatientWorking
{
    // found in formatPatientData()
    public function __construct(
        public int $external_id,
        public int $patientid,
        public string $lastname,
        public string $firstname,
        public string $lastfirst,
        public string $email,
        public string $phone_sms,
        public string $dob,
        public bool $consenttotext,
        public string $language,
    ) {
    }

    public static function fromResponse(Response $response): array
    {
        $data = $response->json();
        $result = [];

        foreach ($data as $item) {
            $firstname = $item['firstname'];
            if (isset($item['altfirstname'])) {
                $firstname = $item['altfirstname'];
            }
            $result[] = new static(
                $item['patientid'],
                $item['patientid'],
                $item['lastname'],
                $firstname,
                $item['lastname'] . ', ' . $firstname,
                $item['email'] ?  $item['email'] : null,
                $item['mobilephone'] ?  $item['mobilephone'] : null,
                $item['dob'],
                $item['consenttotext'] ?  $item['consenttotext'] : false,
                $item['language6392code'] ? $item['language6392code'] : 'eng'
            );
        }
        return $result;
    }

    public static function factory($count)
    {
        $faker = Factory::create();
        $result = [];
        for (
            $i = 1;
            $i <= $count;
            $i++
        ) {
            $data = array(
                'patientid' => $i,
                'lastname' => $faker->lastName(),
                'firstname' => $faker->firstName(),
                'altfirstname'=> $faker->firstName(),
                'email' => $faker->email(),
                'mobilephone' => $faker->phoneNumber(),
                'dob' => $faker->date('Y-m-d'),
                'consenttotext' => $faker->word(),
                'language6392code' => $faker->languageCode()
            );

            if ($count != 1) {
                $result[] = $data;
            } else {
                return json_encode($data);
            }
        }

        return $result;
    }
}
