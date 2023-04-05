<?php

namespace Clinect\NextGen\DataTransferObjects;

use Saloon\Contracts\Response;

class Person
{
    // found in formatPatientData()
    public function __construct(
        public int $external_id,
        public $respondent_id,
        public string $lastname,
        public string $firstname,
        public string $lastfirst,
        public string $preferredname,
        public string $altfirstname,
        public string $email,
        public string $phone_sms,
        public string $dob,
        public string $sex,
        public bool $consenttotext,
        public string $language,
        public bool $has_email,
        public bool $has_phone_sms,
        public string $contactpreference,
    ) {
    }

    public static function fromResponse(Response $response, $type = 'single')
    {
        $data = $response->json();
        if ($type === 'single') {
            return new static(
                $data['external_id'],
                null,
                $data['lastname'],
                $data['firstname'],
                $data['lastname'] . ', ' . $data['firstname'],
                $data['firstname'],
                $data['firstname'],
                $data['email'] ?  $data['email'] : null,
                $data['phone_sms'] ?  $data['phone_sms'] : null,
                $data['dob'],
                $data['sex'] ?  $data['sex'] : null,
                $data['consenttotext'] ?  $data['consenttotext'] : false,
                'eng',
                false,
                false,
                $data['contactpreference'] ?  $data['contactpreference'] : null,
            );
        } else {
            $result = [];
            foreach ($data as $item) {
                $result[] = new static(
                    $item['external_id'],
                    null,
                    $item['lastname'],
                    $item['firstname'],
                    $item['lastname'] . ', ' . $item['firstname'],
                    $item['firstname'],
                    $item['firstname'],
                    $item['email'] ?  $item['email'] : null,
                    $item['phone_sms'] ?  $item['phone_sms'] : null,
                    $item['dob'],
                    $item['sex'] ?  $item['sex'] : null,
                    $item['consenttotext'] ?  $item['consenttotext'] : false,
                    'eng',
                    false,
                    false,
                    $item['contactpreference'] ?  $item['contactpreference'] : null,
                );
            }
            return $result;
        }
    }
}
