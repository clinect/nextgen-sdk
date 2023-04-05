<?php

namespace Clinect\NextGen\DataTransferObjects;

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
}
