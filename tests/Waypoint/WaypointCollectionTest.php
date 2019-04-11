<?php

namespace OpenSkyApi\Tests\Waypoint;

use OpenSkyApi\Waypoint\WaypointCollection;
use OpenSkyApi\Waypoint\WaypointInterface;
use PHPUnit\Framework\TestCase;

final class WaypointCollectionTest extends TestCase
{
    /**
     * @testdox Constructor is callable.
     */
    public function testConstructor(): void
    {
        $this->assertInstanceOf(WaypointCollection::class, new WaypointCollection());
    }

    /**
     * @depends testConstructor
     * @testdox Method getCallsign() returns expected data.
     */
    public function testGetCallsign(): void
    {
        $waypointCollection = new WaypointCollection(['callsign' => 'GAF891']);

        $this->assertIsString($waypointCollection->getCallsign());
        $this->assertEquals('GAF891', $waypointCollection->getCallsign());

        $waypointCollection = new WaypointCollection(['callsign' => null]);

        $this->assertNull($waypointCollection->getCallsign());
    }

    /**
     * @depends testConstructor
     * @testdox Method getEndTime() returns expected data.
     */
    public function testGetEndTime(): void
    {
        $waypointCollection = new WaypointCollection(['endTime' => 1552606604]);

        $this->assertIsInt($waypointCollection->getEndTime());
        $this->assertEquals(1552606604, $waypointCollection->getEndTime());

        $waypointCollection = new WaypointCollection(['endTime' => '1552606604']);

        $this->assertIsInt($waypointCollection->getEndTime());
        $this->assertEquals(1552606604, $waypointCollection->getEndTime());
    }

    /**
     * @depends testConstructor
     * @testdox Method getICAO24() returns expected data.
     */
    public function testGetICAO24(): void
    {
        $waypointCollection = new WaypointCollection(['icao24' => '3c4b26']);

        $this->assertIsString($waypointCollection->getICAO24());
        $this->assertEquals('3c4b26', $waypointCollection->getICAO24());
    }

    /**
     * @depends testConstructor
     * @testdox Method getStartTime() returns expected data.
     */
    public function testGetStartTime(): void
    {
        $waypointCollection = new WaypointCollection(['startTime' => 1552601876]);

        $this->assertIsInt($waypointCollection->getStartTime());
        $this->assertEquals(1552601876, $waypointCollection->getStartTime());

        $waypointCollection = new WaypointCollection(['startTime' => '1552601876']);

        $this->assertIsInt($waypointCollection->getStartTime());
        $this->assertEquals(1552601876, $waypointCollection->getStartTime());
    }

    /**
     * @depends testConstructor
     * @testdox Method getWaypoints() returns expected data.
     */
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

    /**
     * @depends testConstructor
     * @testdox Countable interface is properly implemented.
     */
    public function testCountableInterface(): void
    {
        $waypointCollection = new WaypointCollection(['path' => [[], []]]);

        $this->assertIsInt($waypointCollection->count());
        $this->assertEquals(2, $waypointCollection->count());
    }

    /**
     * @depends testConstructor
     * @testdox Iterator interface is properly implemented.
     */
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
