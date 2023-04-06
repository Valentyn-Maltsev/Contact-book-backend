<?php

namespace App\Validator\Constraint;

use App\Validator\ConstraintPhoneNumberValidator;
use Symfony\Component\Validator\Constraint;

#[\Attribute]
class ConstraintPhoneNumber extends Constraint
{
    public string $message = 'The phone number "{{ string }}" should start from + and be 12 digits long.';

    public string $countryCode;

    public function __construct(string $countryCode, array $groups = null, mixed $payload = null)
    {
        parent::__construct([], $groups, $payload);
        $this->countryCode = $countryCode;
    }

    public function validatedBy()
    {
        return ConstraintPhoneNumberValidator::class;
    }
}