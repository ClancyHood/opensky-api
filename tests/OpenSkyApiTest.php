<?php
/**
 * @author  Jérémie BROUTIER <jeremie.broutier@gmail.com>
 * @license MIT
 */

/**
 * @noinspection PhpUnhandledExceptionInspection
 */

namespace OpenSkyApi\Tests;

use OpenSkyApi\OpenSkyApi;
use PHPUnit\Framework\TestCase;

/**
 * Class OpenSkyApiTest
 * @package OpenSkyApi\Tests
 */
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
     * @testdox Method getFlights() throws an exception if the time interval is greater than 2 hours.
     */
    public function testGetFlightsWithInvalidTimeInterval(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('time interval exceeds the maximum allowed');
        $client->getFlights(1500000000, 1500007201);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByAircraft() throws an exception if the `icao24` parameter is empty.
     */
    public function testGetFlightsByAircraftWithEmptyICAO24(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('empty value is not allowed for the `icao24` parameter');
        $client->getFlightsByAircraft('', 1500000000, 1500000000);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByAircraft() throws an exception if the `icao24` parameter is invalid.
     */
    public function testGetFlightsByAircraftWithInvalidICAO24(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid ICAO 24-bit address for the `icao24` parameter');
        $client->getFlightsByAircraft('badvalue', 1500000000, 1500000000);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByAircraft() throws an exception if the time interval is greater than 30 days.
     */
    public function testGetFlightsByAircraftWithInvalidTimeInterval(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('time interval exceeds the maximum allowed');
        $client->getFlightsByAircraft('3c6444', 1500000000, 1502592001);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByArrivalAirport() throws an exception if the `airport` parameter is empty.
     */
    public function testGetFlightsByArrivalAirportWithEmptyAirport(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('empty value is not allowed for the `airport` parameter');
        $client->getFlightsByArrivalAirport('', 1500000000, 1500000000);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByArrivalAirport() throws an exception if the `airport` parameter is invalid.
     */
    public function testGetFlightsByArrivalAirportWithInvalidAirport(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid ICAO airport code for the `airport` parameter');
        $client->getFlightsByArrivalAirport('badvalue', 1500000000, 1500000000);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByArrivalAirport() throws an exception if the time interval is greater than 7 days.
     */
    public function testGetFlightsByArrivalAirportWithInvalidTimeInterval(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('time interval exceeds the maximum allowed');
        $client->getFlightsByArrivalAirport('LFBO', 1500000000, 1500604801);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByDepartureAirport() throws an exception if the `airport` parameter is empty.
     */
    public function testGetFlightsByDepartureAirportWithEmptyAirport(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('empty value is not allowed for the `airport` parameter');
        $client->getFlightsByDepartureAirport('', 1500000000, 1500000000);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByDepartureAirport() throws an exception if the `airport` parameter is invalid.
     */
    public function testGetFlightsByDepartureAirportWithInvalidAirport(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid ICAO airport code for the `airport` parameter');
        $client->getFlightsByDepartureAirport('badvalue', 1500000000, 1500000000);
    }

    /**
     * @depends testConstructor
     * @testdox Method getFlightsByDepartureAirport() throws an exception if the time interval is greater than 7 days.
     */
    public function testGetFlightsByDepartureAirportWithInvalidTimeInterval(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('time interval exceeds the maximum allowed');
        $client->getFlightsByDepartureAirport('LFBO', 1500000000, 1500604801);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if the `icao24` parameter is not an array.
     */
    public function testgetOwnStatesWithWrongICAO24Type(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid array value for the `icao24` parameter');
        $client->getOwnStates(['icao24' => '32abfa']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if an element of the `icao24` parameter is not a string.
     */
    public function testgetOwnStatesWithWrongICAO24ElementType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid string value for the `icao24` parameter');
        $client->getOwnStates(['icao24' => ['32abfa', 0x32abfa]]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if an element of the `icao24` parameter is empty.
     */
    public function testgetOwnStatesWithEmptyICAO24Element(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('empty value is not allowed for the `icao24` parameter');
        $client->getOwnStates(['icao24' => ['32abfa', '']]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if an element of the `icao24` parameter is invalid.
     */
    public function testgetOwnStatesWithInvalidICAO24Element(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid ICAO 24-bit address for the `icao24` parameter');
        $client->getOwnStates(['icao24' => ['32abfa', 'badvalue']]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if the `time` parameter is not an integer.
     */
    public function testgetOwnStatesWithWrongTimeType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid int value for the `time` parameter');
        $client->getOwnStates(['time' => '1554986109']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if the `time` parameter is more than 1 hour in the past.
     */
    public function testgetOwnStatesWithInvalidTime(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is more than 1 hour in the past for the `time` parameter');
        $client->getOwnStates(['time' => 1500000000]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if the `serials` parameter is not an array.
     */
    public function testgetOwnStatesWithWrongSerialsType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid array value for the `serials` parameter');
        $client->getOwnStates(['serials' => 6746]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if an element of the `serials` parameter is not a string.
     */
    public function testgetOwnStatesWithWrongSerialsElementType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid int value for the `serials` parameter');
        $client->getOwnStates(['serials' => [6746, '3747']]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `icao24` parameter is not an array.
     */
    public function testGetStatesWithWrongICAO24Type(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid array value for the `icao24` parameter');
        $client->getStates(['icao24' => '32abfa']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if an element of the `icao24` parameter is not a string.
     */
    public function testGetStatesWithWrongICAO24ElementType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid string value for the `icao24` parameter');
        $client->getStates(['icao24' => ['32abfa', 0x32abfa]]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if an element of the `icao24` parameter is empty.
     */
    public function testGetStatesWithEmptyICAO24Element(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('empty value is not allowed for the `icao24` parameter');
        $client->getStates(['icao24' => ['32abfa', '']]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if an element of the `icao24` parameter is invalid.
     */
    public function testGetStatesWithInvalidICAO24Element(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid ICAO 24-bit address for the `icao24` parameter');
        $client->getStates(['icao24' => ['32abfa', 'badvalue']]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `time` parameter is not an integer.
     */
    public function testGetStatesWithWrongTimeType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid int value for the `time` parameter');
        $client->getStates(['time' => '1554986109']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `time` parameter is more than 1 hour in the past.
     */
    public function testGetStatesWithInvalidTime(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is more than 1 hour in the past for the `time` parameter');
        $client->getStates(['time' => 1500000000]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamin` parameter is not a float.
     */
    public function testGetStatesWithWrongLaminType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid float value for the `lamin` parameter');
        $client->getStates(['lamin' => '32.8']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamin` parameter is below the valid range.
     */
    public function testGetStatesWithLaminTooLow(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-90,90] for the `lamin` parameter');
        $client->getStates(['lamin' => -100.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamin` parameter is over the valid range.
     */
    public function testGetStatesWithLaminTooHigh(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-90,90] for the `lamin` parameter');
        $client->getStates(['lamin' => 100.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomin` parameter is not a float.
     */
    public function testGetStatesWithWrongLominType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid float value for the `lomin` parameter');
        $client->getStates(['lomin' => '32.8']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomin` parameter is below the valid range.
     */
    public function testGetStatesWithLominTooLow(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-180,180] for the `lomin` parameter');
        $client->getStates(['lomin' => -200.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomin` parameter is over the valid range.
     */
    public function testGetStatesWithLominTooHigh(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-180,180] for the `lomin` parameter');
        $client->getStates(['lomin' => 200.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamax` parameter is not a float.
     */
    public function testGetStatesWithWrongLamaxType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid float value for the `lamax` parameter');
        $client->getStates(['lamax' => '32.8']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamax` parameter is below the valid range.
     */
    public function testGetStatesWithLamaxTooLow(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-90,90] for the `lamax` parameter');
        $client->getStates(['lamax' => -100.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamax` parameter is over the valid range.
     */
    public function testGetStatesWithLamaxTooHigh(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-90,90] for the `lamax` parameter');
        $client->getStates(['lamax' => 100.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomax` parameter is not a float.
     */
    public function testGetStatesWithWrongLomaxType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid float value for the `lomax` parameter');
        $client->getStates(['lomax' => '32.8']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomax` parameter is below the valid range.
     */
    public function testGetStatesWithLomaxTooLow(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-180,180] for the `lomax` parameter');
        $client->getStates(['lomax' => -200.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomax` parameter is over the valid range.
     */
    public function testGetStatesWithLomaxTooHigh(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-180,180] for the `lomax` parameter');
        $client->getStates(['lomax' => 200.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getTrack() throws an exception if the `icao24` parameter is empty.
     */
    public function testGetTrackWithEmptyICAO24(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('empty value is not allowed for the `icao24` parameter');
        $client->getTrack('');
    }

    /**
     * @depends testConstructor
     * @testdox Method getTrack() throws an exception if the `icao24` parameter is invalid.
     */
    public function testGetTrackWithInvalidICAO24(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid ICAO 24-bit address for the `icao24` parameter');
        $client->getTrack('badvalue');
    }

    /**
     * @depends testConstructor
     * @testdox Method getTrack() throws an exception if the `time` parameter is more than 30 days in the past.
     */
    public function testGetTrackWithInvalidTime(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is more than 30 days in the past for the `time` parameter');
        $client->getTrack('3c6444', 1500000000);
    }
}
