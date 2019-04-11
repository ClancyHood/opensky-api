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
    }

    public function testGetArrivalAirportCandidatesCount(): void
    {
    }

    public function testGetArrivalAirportHorizontalDistance(): void
    {
    }

    public function testGetArrivalAirportVerticalDistance(): void
    {
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
