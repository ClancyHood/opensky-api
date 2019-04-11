<?php

namespace OpenSkyApi\Tests\Waypoint;

use OpenSkyApi\Waypoint\WaypointCollection;
use OpenSkyApi\Waypoint\WaypointInterface;
use PHPUnit\Framework\TestCase;

final class WaypointCollectionTest extends TestCase
{
    public function testConstructor(): void
    {
        $this->assertInstanceOf(WaypointCollection::class, new WaypointCollection());
    }

    public function testGetCallsign(): void
    {
        $waypointCollection = new WaypointCollection(['callsign' => 'GAF891']);

        $this->assertIsString($waypointCollection->getCallsign());
        $this->assertEquals('GAF891', $waypointCollection->getCallsign());

        $waypointCollection = new WaypointCollection(['callsign' => null]);

        $this->assertNull($waypointCollection->getCallsign());
    }

    public function testGetEndTime(): void
    {
        $waypointCollection = new WaypointCollection(['endTime' => 1552606604]);

        $this->assertIsInt($waypointCollection->getEndTime());
        $this->assertEquals(1552606604, $waypointCollection->getEndTime());

        $waypointCollection = new WaypointCollection(['endTime' => '1552606604']);

        $this->assertIsInt($waypointCollection->getEndTime());
        $this->assertEquals(1552606604, $waypointCollection->getEndTime());
    }

    public function testGetICAO24(): void
    {
        $waypointCollection = new WaypointCollection(['icao24' => '3c4b26']);

        $this->assertIsString($waypointCollection->getICAO24());
        $this->assertEquals('3c4b26', $waypointCollection->getICAO24());
    }

    public function testGetStartTime(): void
    {
        $waypointCollection = new WaypointCollection(['startTime' => 1552601876]);

        $this->assertIsInt($waypointCollection->getStartTime());
        $this->assertEquals(1552601876, $waypointCollection->getStartTime());

        $waypointCollection = new WaypointCollection(['startTime' => '1552601876']);

        $this->assertIsInt($waypointCollection->getStartTime());
        $this->assertEquals(1552601876, $waypointCollection->getStartTime());
    }

    public function testGetWaypoints(): void
    {
        $waypointCollection = new WaypointCollection(['path' => [[], []]]);

        $this->assertIsArray($waypointCollection->getWaypoints());
        $this->assertCount(2, $waypointCollection->getWaypoints());
        $this->assertInstanceOf(WaypointInterface::class, $waypointCollection->getWaypoints()[0]);

        $waypointCollection = new WaypointCollection();

        $this->assertIsArray($waypointCollection->getWaypoints());
        $this->assertEmpty($waypointCollection->getWaypoints());
    }

    public function testCountableInterface(): void
    {
        $waypointCollection = new WaypointCollection(['path' => [[], []]]);

        $this->assertIsInt($waypointCollection->count());
        $this->assertEquals(2, $waypointCollection->count());
    }

    public function testIteratorInterface(): void
    {
        $waypointCollection = new WaypointCollection(['path' => [[], []]]);

        $this->assertInstanceOf(WaypointInterface::class, $waypointCollection->current());
        $this->assertIsInt($waypointCollection->key());
        $this->assertEquals(0, $waypointCollection->key());

        $waypointCollection->next();

        $this->assertTrue($waypointCollection->valid());
        $this->assertEquals(1, $waypointCollection->key());

        $waypointCollection->next();
        $waypointCollection->next();

        $this->assertIsBool($waypointCollection->valid());
        $this->assertFalse($waypointCollection->valid());

        $waypointCollection->rewind();

        $this->assertTrue($waypointCollection->valid());
        $this->assertEquals(0, $waypointCollection->key());
    }
}
