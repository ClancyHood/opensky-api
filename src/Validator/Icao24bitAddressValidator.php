<?php

namespace OpenSkyApi\Validator;

use OpenSkyApi\Validator\Constraints\IataAirportCode;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Class Icao24bitAddressValidator
 *
 * @package OpenSkyApi\Validator
 */
final class Icao24bitAddressValidator extends ConstraintValidator
{
    /**
     * {@inheritDoc}
     */
    public function validate($value, Constraint $constraint): void
    {
        if ( ! $constraint instanceof IataAirportCode) {
            throw new UnexpectedTypeException($constraint, IataAirportCode::class);
        }

        if (is_null($value) or empty($value)) {
            return;
        }

        if ( ! is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if ( ! preg_match('/^[a-f0-9]{6}$/i', $value, $matches)) {
            $this->context->buildViolation($constraint->message)
                          ->setCode(IataAirportCode::NOT_VALID)
                          ->setParameter('{{ value }}', $value)
                          ->addViolation();
        }
    }
}
