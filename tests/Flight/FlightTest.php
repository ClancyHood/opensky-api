<?php

namespace OpenSkyApi\Tests\Flight;

use OpenSkyApi\Flight\Flight;
use PHPUnit\Framework\TestCase;

final class FlightTest extends TestCase
{
    /**
     * @testdox Constructor is callable.
     */
    public function testConstructor(): void
    {
        $this->assertInstanceOf(Flight::class, new Flight());
    }

    /**
     * @depends testConstructor
     * @testdox Method getArrivalAirport() returns expected data.
     */
    public function testGetArrivalAirport(): void
    {
        $flight = new Flight(['estArrivalAirport' => 'EDDF']);

        $this->assertIsString($flight->getArrivalAirport());
        $this->assertEquals('EDDF', $flight->getArrivalAirport());

        $flight = new Flight(['estArrivalAirport' => null]);

        $this->assertNull($flight->getArrivalAirport());
    }

    /**
     * @depends testConstructor
     * @testdox Method getArrivalAirportCandidatesCount() returns expected data.
     */
    public function testGetArrivalAirportCandidatesCount(): void
    {
        $flight = new Flight(['arrivalAirportCandidatesCount' => 2]);

        $this->assertIsInt($flight->getArrivalAirportCandidatesCount());
        $this->assertEquals(2, $flight->getArrivalAirportCandidatesCount());

        $flight = new Flight(['arrivalAirportCandidatesCount' => '2']);

        $this->assertIsInt($flight->getArrivalAirportCandidatesCount());
        $this->assertEquals(2, $flight->getArrivalAirportCandidatesCount());
    }

    /**
     * @depends testConstructor
     * @testdox Method getArrivalAirportHorizontalDistance() returns expected data.
     */
    public function testGetArrivalAirportHorizontalDistance(): void
    {
        $flight = new Flight(['estArrivalAirportHorizDistance' => 1593]);

        $this->assertIsInt($flight->getArrivalAirportHorizontalDistance());
        $this->assertEquals(1593, $flight->getArrivalAirportHorizontalDistance());

        $flight = new Flight(['estArrivalAirportHorizDistance' => '1593']);

        $this->assertIsInt($flight->getArrivalAirportHorizontalDistance());
        $this->assertEquals(1593, $flight->getArrivalAirportHorizontalDistance());

        $flight = new Flight(['estArrivalAirportHorizDistance' => null]);

        $this->assertNull($flight->getArrivalAirportHorizontalDistance());
    }

    /**
     * @depends testConstructor
     * @testdox Method getArrivalAirportVerticalDistance() returns expected data.
     */
    public function testGetArrivalAirportVerticalDistance(): void
    {
        $flight = new Flight(['estArrivalAirportVertDistance' => 95]);

        $this->assertIsInt($flight->getArrivalAirportVerticalDistance());
        $this->assertEquals(95, $flight->getArrivalAirportVerticalDistance());

        $flight = new Flight(['estArrivalAirportVertDistance' => '95']);

        $this->assertIsInt($flight->getArrivalAirportVerticalDistance());
        $this->assertEquals(95, $flight->getArrivalAirportVerticalDistance());

        $flight = new Flight(['estArrivalAirportVertDistance' => null]);

        $this->assertNull($flight->getArrivalAirportVerticalDistance());
    }

    /**
     * @depends testConstructor
     * @testdox Method getArrivalTime() returns expected data.
     */
    public function testGetArrivalTime(): void
    {
        $flight = new Flight(['lastSeen' => 1517230737]);

        $this->assertIsInt($flight->getArrivalTime());
        $this->assertEquals(1517230737, $flight->getArrivalTime());

        $flight = new Flight(['lastSeen' => '1517230737']);

        $this->assertIsInt($flight->getArrivalTime());
        $this->assertEquals(1517230737, $flight->getArrivalTime());
    }

    /**
     * @depends testConstructor
     * @testdox Method getCallsign() returns expected data.
     */
    public function testGetCallsign(): void
    {
        $flight = new Flight(['callsign' => 'MSR785  ']);

        $this->assertIsString($flight->getCallsign());
        $this->assertEquals('MSR785  ', $flight->getCallsign());
    }

    /**
     * @depends testConstructor
     * @testdox Method getDepartureAirport() returns expected data.
     */
    public function testGetDepartureAirport(): void
    {
        $flight = new Flight(['estDepartureAirport' => 'EDDT']);

        $this->assertIsString($flight->getDepartureAirport());
        $this->assertEquals('EDDT', $flight->getDepartureAirport());

        $flight = new Flight(['estDepartureAirport' => null]);

        $this->assertNull($flight->getDepartureAirport());
    }

    /**
     * @depends testConstructor
     * @testdox Method getDepartureAirportCandidatesCount() returns expected data.
     */
    public function testGetDepartureAirportCandidatesCount(): void
    {
        $flight = new Flight(['departureAirportCandidatesCount' => 1]);

        $this->assertIsInt($flight->getDepartureAirportCandidatesCount());
        $this->assertEquals(1, $flight->getDepartureAirportCandidatesCount());

        $flight = new Flight(['departureAirportCandidatesCount' => '1']);

        $this->assertIsInt($flight->getDepartureAirportCandidatesCount());
        $this->assertEquals(1, $flight->getDepartureAirportCandidatesCount());
    }

    /**
     * @depends testConstructor
     * @testdox Method getDepartureAirportHorizontalDistance() returns expected data.
     */
    public function testGetDepartureAirportHorizontalDistance(): void
    {
        $flight = new Flight(['estDepartureAirportHorizDistance' => 191]);

        $this->assertIsInt($flight->getDepartureAirportHorizontalDistance());
        $this->assertEquals(191, $flight->getDepartureAirportHorizontalDistance());

        $flight = new Flight(['estDepartureAirportHorizDistance' => '191']);

        $this->assertIsInt($flight->getDepartureAirportHorizontalDistance());
        $this->assertEquals(191, $flight->getDepartureAirportHorizontalDistance());

        $flight = new Flight(['estDepartureAirportHorizDistance' => null]);

        $this->assertNull($flight->getDepartureAirportHorizontalDistance());
    }

    /**
     * @depends testConstructor
     * @testdox Method getDepartureAirportVerticalDistance() returns expected data.
     */
    public function testGetDepartureAirportVerticalDistance(): void
    {
        $flight = new Flight(['estDepartureAirportVertDistance' => 54]);

        $this->assertIsInt($flight->getDepartureAirportVerticalDistance());
        $this->assertEquals(54, $flight->getDepartureAirportVerticalDistance());

        $flight = new Flight(['estDepartureAirportVertDistance' => '54']);

        $this->assertIsInt($flight->getDepartureAirportVerticalDistance());
        $this->assertEquals(54, $flight->getDepartureAirportVerticalDistance());

        $flight = new Flight(['estDepartureAirportVertDistance' => null]);

        $this->assertNull($flight->getDepartureAirportVerticalDistance());
    }

    /**
     * @depends testConstructor
     * @testdox Method getDepartureTime() returns expected data.
     */
    public function testGetDepartureTime(): void
    {
        $flight = new Flight(['firstSeen' => 1517227831]);

        $this->assertIsInt($flight->getDepartureTime());
        $this->assertEquals(1517227831, $flight->getDepartureTime());

        $flight = new Flight(['firstSeen' => '1517227831']);

        $this->assertIsInt($flight->getDepartureTime());
        $this->assertEquals(1517227831, $flight->getDepartureTime());
    }

    /**
     * @depends testConstructor
     * @testdox Method getICAO24() returns expected data.
     */
    public function testGetICAO24(): void
    {
        $flight = new Flight(['icao24' => '3c6675']);

        $this->assertIsString($flight->getICAO24());
        $this->assertEquals('3c6675', $flight->getICAO24());
    }
}
