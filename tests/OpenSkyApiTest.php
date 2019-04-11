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

    /**
     * @depends testConstructor
     * @testdox Method getFlights() throws an exception on invalid time interval.
     */
    public function testGetFlightsThrowsExceptionOnInvalidTimeInterval(): void
    {
        $client = new OpenSkyApi();

        $this->expectException(\InvalidArgumentException::class);
        $client->getFlights(0, 7201);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByAircraft() throws an exception on invalid time interval.
     */
    public function testGetFlightsByAircraftThrowsExceptionOnInvalidTimeInterval(): void
    {
        $client = new OpenSkyApi();

        $this->expectException(\InvalidArgumentException::class);
        $client->getFlightsByAircraft('3c6675', 0, 2592001);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByAircraft() throws an exception on empty ICAO 24-bit address.
     */
    public function testGetFlightsByAircraftThrowsExceptionOnEmptyICAO24Address(): void
    {
        $client = new OpenSkyApi();

        $this->expectException(\InvalidArgumentException::class);
        $client->getFlightsByAircraft('', 0, 0);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByAircraft() throws an exception on invalid ICAO 24-bit address.
     */
    public function testGetFlightsByAircraftThrowsExceptionOnInvalidICAO24Address(): void
    {
        $client = new OpenSkyApi();

        $this->expectException(\InvalidArgumentException::class);
        $client->getFlightsByAircraft('badvalue', 0, 0);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByArrivalAirport() throws an exception on empty airport code.
     */
    public function testGetFlightsByArrivalAirportThrowsExceptionOnEmptyAirportCode(): void
    {
        $client = new OpenSkyApi();

        $this->expectException(\InvalidArgumentException::class);
        $client->getFlightsByArrivalAirport('', 0, 0);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByArrivalAirport() throws an exception on invalid airport code.
     */
    public function testGetFlightsByArrivalAirportThrowsExceptionOnInvalidAirportCode(): void
    {
        $client = new OpenSkyApi();

        $this->expectException(\InvalidArgumentException::class);
        $client->getFlightsByArrivalAirport('badvalue', 0, 0);
    }
}
