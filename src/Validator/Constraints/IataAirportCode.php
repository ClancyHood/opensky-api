<?php

namespace OpenSkyApi\Validator\Constraints;

use OpenSkyApi\Validator\IataAirportCodeValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class IataAirportCode
 *
 * @package OpenSkyApi\Validator\Constraints
 *
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
final class IataAirportCode extends Constraint
{
    public const NOT_VALID = '9b5978e4-dc2c-4f43-9e2c-266679d8d4ae';

    public $message = 'The string {{ value }} is not a valid IATA airport code.';

    /**
     * {@inheritDoc}
     */
    public function validatedBy(): string
    {
        return IataAirportCodeValidator::class;
    }
}
