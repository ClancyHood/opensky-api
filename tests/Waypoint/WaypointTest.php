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
        $waypoint = new Waypoint([3 => 914]);

        $this->assertIsInt($waypoint->getBarometricAltitude());
        $this->assertEquals(914, $waypoint->getBarometricAltitude());

        $waypoint = new Waypoint([3 => null]);

        $this->assertNull($waypoint->getBarometricAltitude());
    }

    public function testGetHeading(): void
    {
        $waypoint = new Waypoint([4 => 87.0]);

        $this->assertIsFloat($waypoint->getHeading());
        $this->assertEquals(87.0, $waypoint->getHeading());

        $waypoint = new Waypoint([4 => null]);

        $this->assertNull($waypoint->getHeading());
    }

    public function testGetLatitude(): void
    {
        $waypoint = new Waypoint([1 => 13.2072]);

        $this->assertIsFloat($waypoint->getLatitude());
        $this->assertEquals(13.2072, $waypoint->getLatitude());

        $waypoint = new Waypoint([1 => null]);

        $this->assertNull($waypoint->getLatitude());
    }

    public function testGetLongitude(): void
    {
        $waypoint = new Waypoint([2 => 77.734]);

        $this->assertIsFloat($waypoint->getLongitude());
        $this->assertEquals(77.734, $waypoint->getLongitude());

        $waypoint = new Waypoint([2 => null]);

        $this->assertNull($waypoint->getLongitude());
    }

    public function testIsOnGround(): void
    {
        $waypoint = new Waypoint([5 => false]);

        $this->assertIsBool($waypoint->isOnGround());
        $this->assertFalse($waypoint->isOnGround());
    }

    public function testGetTime(): void
    {
        $waypoint = new Waypoint([0 => 1552601876]);

        $this->assertIsInt($waypoint->getTime());
        $this->assertEquals(1552601876, $waypoint->getTime());
    }
}
