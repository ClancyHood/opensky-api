<?php

namespace OpenSkyApi\Tests\Waypoint;

use OpenSkyApi\Waypoint\Waypoint;
use PHPUnit\Framework\TestCase;

final class WaypointTest extends TestCase
{
    public function testConstructor(): void
    {
        $this->assertInstanceOf(Waypoint::class, new Waypoint());
    }

    public function testGetBarometricAltitude(): void
    {
    }

    public function testGetHeading(): void
    {
    }

    public function testGetLatitude(): void
    {
    }

    public function testGetLongitude(): void
    {
    }

    public function testIsOnGround(): void
    {
    }

    public function testGetTime(): void
    {
    }
}
