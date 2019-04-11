<?php

namespace OpenSkyApi\Tests\Flight;

use OpenSkyApi\Flight\Flight;
use PHPUnit\Framework\TestCase;

final class FlightTest extends TestCase
{
    public function testConstructor(): void
    {
        $this->assertInstanceOf(Flight::class, new Flight());
    }

    public function testGetArrivalAirport(): void
    {
        $flight = new Flight(['estArrivalAirport' => 'EDDF']);

        $this->assertIsString($flight->getArrivalAirport());
        $this->assertEquals('EDDF', $flight->getArrivalAirport());

        $flight = new Flight(['estArrivalAirport' => null]);

        $this->assertNull($flight->getArrivalAirport());
    }

    public function testGetArrivalAirportCandidatesCount(): void
    {
        $flight = new Flight(['arrivalAirportCandidatesCount' => 2]);

        $this->assertIsInt($flight->getArrivalAirportCandidatesCount());
        $this->assertEquals(2, $flight->getArrivalAirportCandidatesCount());

        $flight = new Flight(['arrivalAirportCandidatesCount' => '2']);

        $this->assertIsInt($flight->getArrivalAirportCandidatesCount());
        $this->assertEquals(2, $flight->getArrivalAirportCandidatesCount());
    }

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

    public function testGetArrivalTime(): void
    {
        $flight = new Flight(['lastSeen' => 1517230737]);

        $this->assertIsInt($flight->getArrivalTime());
        $this->assertEquals(1517230737, $flight->getArrivalTime());

        $flight = new Flight(['lastSeen' => '1517230737']);

        $this->assertIsInt($flight->getArrivalTime());
        $this->assertEquals(1517230737, $flight->getArrivalTime());
    }

    public function testGetCallsign(): void
    {
        $flight = new Flight(['callsign' => 'MSR785  ']);

        $this->assertIsString($flight->getCallsign());
        $this->assertEquals('MSR785  ', $flight->getCallsign());
    }

    public function testGetDepartureAirport(): void
    {
        $flight = new Flight(['estDepartureAirport' => 'EDDT']);

        $this->assertIsString($flight->getDepartureAirport());
        $this->assertEquals('EDDT', $flight->getDepartureAirport());

        $flight = new Flight(['estDepartureAirport' => null]);

        $this->assertNull($flight->getDepartureAirport());
    }

    public function testGetDepartureAirportCandidatesCount(): void
    {
        $flight = new Flight(['departureAirportCandidatesCount' => 1]);

        $this->assertIsInt($flight->getDepartureAirportCandidatesCount());
        $this->assertEquals(1, $flight->getDepartureAirportCandidatesCount());

        $flight = new Flight(['departureAirportCandidatesCount' => '1']);

        $this->assertIsInt($flight->getDepartureAirportCandidatesCount());
        $this->assertEquals(1, $flight->getDepartureAirportCandidatesCount());
    }

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

    public function testGetDepartureTime(): void
    {
        $flight = new Flight(['firstSeen' => 1517227831]);

        $this->assertIsInt($flight->getDepartureTime());
        $this->assertEquals(1517227831, $flight->getDepartureTime());

        $flight = new Flight(['firstSeen' => '1517227831']);

        $this->assertIsInt($flight->getDepartureTime());
        $this->assertEquals(1517227831, $flight->getDepartureTime());
    }

    public function testGetICAO24(): void
    {
        $flight = new Flight(['icao24' => '3c6675']);

        $this->assertIsString($flight->getICAO24());
        $this->assertEquals('3c6675', $flight->getICAO24());
    }
}
