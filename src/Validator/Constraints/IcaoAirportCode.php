<?php

namespace OpenSkyApi\Validator\Constraints;

use OpenSkyApi\Validator\IcaoAirportCodeValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class IcaoAirportCode
 *
 * @package OpenSkyApi\Validator\Constraints
 *
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
final class IcaoAirportCode extends Constraint
{
    public const NOT_VALID = '074f30e3-426f-4f27-b0f7-983a5186a76c';

    public $message = 'The string {{ value }} is not a valid ICAO airport code.';

    /**
     * {@inheritDoc}
     */
    public function validatedBy(): string
    {
        return IcaoAirportCodeValidator::class;
    }
}
