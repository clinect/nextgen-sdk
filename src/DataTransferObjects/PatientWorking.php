<?php

namespace Clinect\NextGenSdk\DataTransferObjects;

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
            $result[] = new static(
                $item['patientid'],
                $item['patientid'],
                $item['lastname'],
                $item['firstname'],
                $item['lastName'] . ', ' . $data['firstName'],
                $item['email'] ?  $data['email'] : null,
                $item['mobilephone'] ?  $data['mobilephone'] : null,
                $item['dob']->format('Y-m-d'),
                $item['consenttotext'] ?  $data['consenttotext'] : false,
                $item['language6392code'] ? $item['language6392code'] : 'eng'
            );
        }
        return $result;
    }
}