<?php
/**
 * @noinspection PhpUnhandledExceptionInspection
 */

namespace OpenSkyApi\Tests;

use OpenSkyApi\OpenSkyApi;
use PHPUnit\Framework\TestCase;

final class OpenSkyApiTest extends TestCase
{
    /**
     * @testdox Constructor is callable.
     */
    public function testConstructor(): void
    {
        $this->assertInstanceOf(OpenSkyApi::class, new OpenSkyApi());
    }
}
