<?php

namespace App\Validator;

use App\Repository\CountryRepository;
use App\Validator\Constraint\ConstraintPhoneNumber;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class ConstraintPhoneNumberValidator extends ConstraintValidator
{
    public function __construct(private readonly CountryRepository $countryRepository)
    {}

    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof ConstraintPhoneNumber) {
            throw new UnexpectedTypeException($constraint, ConstraintPhoneNumber::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        $country = $this->countryRepository->findByCountryCode($constraint->countryCode);
        $countryPhoneCode = $country->getPhoneCode();
        $reg = "/^\+" . $countryPhoneCode . "[0-9]{10}$/";

        if (!preg_match($reg, $value, $matches)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}