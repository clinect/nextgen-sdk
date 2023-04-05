<?php

namespace Clinect\NextGen\DataTransferObjects\Persons;

use Faker\Factory;
use Saloon\Contracts\Response;

class PersonSearch
{
    // found in formatPatientData()
    public function __construct(
        public int $patientid,
        public int $patientnumber,
        public string $firstname,
        public string $lastname,
        public string $dob,
    ) {
    }

    public static function fromResponse(Response $response): array
    {
        $data = $response->json();
        $result = [];
        foreach ($data as $item) {
            $result[] = new static(
                $item['id'],
                $item['personNumber'],
                $item['firstName'],
                $item['lastName'],
                $item['dateOfBirth'],
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
                'id' => $i,
                'personNumber' => $faker->randomNumber(),
                'firstName' => $faker->firstName(),
                'lastName' => $faker->lastName(),
                'dateOfBirth' => $faker->date('Y-m-d'),
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
