<?php

namespace OpenSkyApi\Validator;

use OpenSkyApi\Validator\Constraints\IcaoAirportCode;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Class IcaoAirportCodeValidator
 *
 * @package OpenSkyApi\Validator
 */
final class IcaoAirportCodeValidator extends ConstraintValidator
{
    /**
     * {@inheritDoc}
     */
    public function validate($value, Constraint $constraint): void
    {
        if ( ! $constraint instanceof IcaoAirportCode) {
            throw new UnexpectedTypeException($constraint, IcaoAirportCode::class);
        }

        if (is_null($value) or empty($value)) {
            return;
        }

        if ( ! is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if ( ! preg_match('/^[A-Z]{4}$/', $value, $matches)) {
            $this->context->buildViolation($constraint->message)
                          ->setCode(IcaoAirportCode::NOT_VALID)
                          ->setParameter('{{ value }}', $value)
                          ->addViolation();
        }
    }
}
