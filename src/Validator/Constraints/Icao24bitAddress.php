<?php

namespace OpenSkyApi\Validator\Constraints;

use OpenSkyApi\Validator\Icao24bitAddressValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class Icao24bitAddress
 *
 * @package OpenSkyApi\Validator\Constraints
 *
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
final class Icao24bitAddress extends Constraint
{
    public const NOT_VALID = '2f2f5a80-e819-45da-a60f-0d750398d47e';

    public $message = 'The string {{ value }} is not a valid ICAO 24-bit address.';

    /**
     * {@inheritDoc}
     */
    public function validatedBy(): string
    {
        return Icao24bitAddressValidator::class;
    }
}
