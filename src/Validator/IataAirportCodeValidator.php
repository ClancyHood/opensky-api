<?php

namespace OpenSkyApi\Validator;

use OpenSkyApi\Validator\Constraints\IataAirportCode;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Class IataAirportCodeValidator
 *
 * @package OpenSkyApi\Validator
 */
final class IataAirportCodeValidator extends ConstraintValidator
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

        if ( ! preg_match('/^[A-Z]{3}$/', $value, $matches)) {
            $this->context->buildViolation($constraint->message)
                          ->setCode(IataAirportCode::NOT_VALID)
                          ->setParameter('{{ value }}', $value)
                          ->addViolation();
        }
    }
}
