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
    }

    public function testGetCallsign(): void
    {
    }

    public function testGetDepartureAirport(): void
    {
    }

    public function testGetDepartureAirportCandidatesCount(): void
    {
    }

    public function testGetDepartureAirportHorizontalDistance(): void
    {
    }

    public function testGetDepartureAirportVerticalDistance(): void
    {
    }

    public function testGetDepartureTime(): void
    {
    }

    public function testGetICAO24(): void
    {
    }
}
