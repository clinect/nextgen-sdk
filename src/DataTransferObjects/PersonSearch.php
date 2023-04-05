<?php

namespace Clinect\NextGen\DataTransferObjects;

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
                $item['patientid'],
                $item['patientnumber'],
                $item['firstname'],
                $item['lastname'],
                $item['dob'],
            );
        }
        return $result;
    }

    public static function factory($count)
    {
        $faker = Factory::create();
        $result = [];
        for (
            $i = 0;
            $i < $count;
            $i++
        ) {
            $data = new static(
                $i,
                $faker->randomNumber(),
                $faker->firstName(),
                $faker->lastName(),
                $faker->date('Y_m_d'),
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
