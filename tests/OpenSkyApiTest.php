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
     * @testdox Method getOwnStates() throws an exception if the `icao24` parameter is not an array.
     */
    public function testgetOwnStatesICAO24WrongType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid array value for the `icao24` parameter');
        $client->getOwnStates(['icao24' => '32abfa']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if an element of the `icao24` parameter is not a string.
     */
    public function testgetOwnStatesICAO24ElementWrongType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid string value for the `icao24` parameter');
        $client->getOwnStates(['icao24' => ['32abfa', 0x32abfa]]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if an element of the `icao24` parameter is empty.
     */
    public function testgetOwnStatesICAO24ElementEmpty(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('empty value is not allowed for the `icao24` parameter');
        $client->getOwnStates(['icao24' => ['32abfa', '']]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if an element of the `icao24` parameter is not a valid ICAO 24-bit address.
     */
    public function testgetOwnStatesICAO24ElementInvalid(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid ICAO 24-bit address for the `icao24` parameter');
        $client->getOwnStates(['icao24' => ['32abfa', 'badvalue']]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if the `time` parameter is not an integer.
     */
    public function testgetOwnStatesTimeWrongType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid int value for the `time` parameter');
        $client->getOwnStates(['time' => '1554986109']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getOwnStates() throws an exception if the `time` parameter is more than 1 hour in the past.
     */
    public function testgetOwnStatesTimeTooLow(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is more than 1 hour in the past for the `time` parameter');
        $client->getOwnStates(['time' => 1500000000]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `icao24` parameter is not an array.
     */
    public function testGetStatesICAO24WrongType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid array value for the `icao24` parameter');
        $client->getStates(['icao24' => '32abfa']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if an element of the `icao24` parameter is not a string.
     */
    public function testGetStatesICAO24ElementWrongType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid string value for the `icao24` parameter');
        $client->getStates(['icao24' => ['32abfa', 0x32abfa]]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if an element of the `icao24` parameter is empty.
     */
    public function testGetStatesICAO24ElementEmpty(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('empty value is not allowed for the `icao24` parameter');
        $client->getStates(['icao24' => ['32abfa', '']]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if an element of the `icao24` parameter is not a valid ICAO 24-bit address.
     */
    public function testGetStatesICAO24ElementInvalid(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid ICAO 24-bit address for the `icao24` parameter');
        $client->getStates(['icao24' => ['32abfa', 'badvalue']]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `time` parameter is not an integer.
     */
    public function testGetStatesTimeWrongType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid int value for the `time` parameter');
        $client->getStates(['time' => '1554986109']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `time` parameter is more than 1 hour in the past.
     */
    public function testGetStatesTimeTooLow(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is more than 1 hour in the past for the `time` parameter');
        $client->getStates(['time' => 1500000000]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamin` parameter is not a float.
     */
    public function testGetStatesLaminWrongType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid float value for the `lamin` parameter');
        $client->getStates(['lamin' => '32.8']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamin` parameter is below the valid range.
     */
    public function testGetStatesLaminTooLow(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-90,90] for the `lamin` parameter');
        $client->getStates(['lamin' => -100.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamin` parameter is over the valid range.
     */
    public function testGetStatesLaminTooHigh(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-90,90] for the `lamin` parameter');
        $client->getStates(['lamin' => 100.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomin` parameter is not a float.
     */
    public function testGetStatesLominWrongType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid float value for the `lomin` parameter');
        $client->getStates(['lomin' => '32.8']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomin` parameter is below the valid range.
     */
    public function testGetStatesLominTooLow(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-180,180] for the `lomin` parameter');
        $client->getStates(['lomin' => -200.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomin` parameter is over the valid range.
     */
    public function testGetStatesLominTooHigh(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-180,180] for the `lomin` parameter');
        $client->getStates(['lomin' => 200.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamax` parameter is not a float.
     */
    public function testGetStatesLamaxWrongType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid float value for the `lamax` parameter');
        $client->getStates(['lamax' => '32.8']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamax` parameter is below the valid range.
     */
    public function testGetStatesLamaxTooLow(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-90,90] for the `lamax` parameter');
        $client->getStates(['lamax' => -100.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lamax` parameter is over the valid range.
     */
    public function testGetStatesLamaxTooHigh(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-90,90] for the `lamax` parameter');
        $client->getStates(['lamax' => 100.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomax` parameter is not a float.
     */
    public function testGetStatesLomaxWrongType(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not a valid float value for the `lomax` parameter');
        $client->getStates(['lomax' => '32.8']);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomax` parameter is below the valid range.
     */
    public function testGetStatesLomaxTooLow(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-180,180] for the `lomax` parameter');
        $client->getStates(['lomax' => -200.0]);
    }

    /**
     * @depends testConstructor
     * @testdox Method getStates() throws an exception if the `lomax` parameter is over the valid range.
     */
    public function testGetStatesLomaxTooHigh(): void
    {
        $client = new OpenSkyApi();

        $this->expectExceptionMessage('is not within the valid range [-180,180] for the `lomax` parameter');
        $client->getStates(['lomax' => 200.0]);
    }
}
