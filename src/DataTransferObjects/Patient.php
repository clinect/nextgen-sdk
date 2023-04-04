<?php

namespace Clinect\NextGen\DataTransferObjects;

use Saloon\Contracts\Response;

class Patient
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
                $data['id'],
                null,
                $data['lastName'],
                $data['firstName'],
                $data['lastName'] . ', ' . $data['firstName'],
                $data['firstName'],
                $data['firstName'],
                $data['email'] ?  $data['email'] : null,
                $data['cellPhone'] ?  $data['cellPhone'] : null,
                $data['dateOfBirth'],
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
                    $item['id'],
                    null,
                    $item['lastName'],
                    $item['firstName'],
                    $item['lastName'] . ', ' . $item['firstName'],
                    $item['firstName'],
                    $item['firstName'],
                    $item['email'] ?  $item['email'] : null,
                    $item['cellPhone'] ?  $item['cellPhone'] : null,
                    $item['dateOfBirth'],
                    $item['sex'] ?  $item['sex'] : null,
                    $item['consenttotext'] ?  $item['consenttotext'] : false,
                    'eng',
                    false,
                    false,
                    $item['contactpreference'] ?  $item['contactpreference'] : null,
                );
            }
        }
    }
}
