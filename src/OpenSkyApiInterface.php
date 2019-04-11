<?php
/**
 * @author  Jérémie BROUTIER <jeremie.broutier@gmail.com>
 * @license MIT
 */

namespace OpenSkyApi;

use OpenSkyApi\Exception\AuthenticationRequiredException;
use OpenSkyApi\Exception\BadCredentialsException;
use OpenSkyApi\Flight\FlightInterface;
use OpenSkyApi\State\StateCollectionInterface;
use OpenSkyApi\Waypoint\WaypointCollectionInterface;

/**
 * Interface OpenSkyApiInterface
 * @package OpenSkyApi
 */
interface OpenSkyApiInterface
{
    /**
     * Creates an instance of the client.
     *
     * @param string|null $username An optional username.
     * @param string|null $password An optional password.
     */
    public function __construct(string $username = null, string $password = null);

    /**
     * Returns all flights for a given time interval.
     *
     * @param int $begin The timestamp corresponding to the begining of the time interval.
     * @param int $end   The timestamp corresponding to the end of the time interval.
     *
     * @return FlightInterface[]
     *
     * @throws BadCredentialsException   If the provided credentials are invalid.
     * @throws \InvalidArgumentException If any parameter is invalid.
     * @throws \Exception                If any other error occurs.
     */
    public function getFlights(int $begin, int $end): array;

    /**
     * Returns flighs for a particular aircraft which departed or arrived within a given time interval.
     *
     * @param string $icao24 The ICAO 24-bit address of the aircraft, in hexadecimal string representation.
     * @param int    $begin  The timestamp corresponding to the begining of the time interval.
     * @param int    $end    The timestamp corresponding to the end of the time interval.
     *
     * @return FlightInterface[]
     *
     * @throws BadCredentialsException   If the provided credentials are invalid.
     * @throws \InvalidArgumentException If any parameter is invalid.
     * @throws \Exception                If any other error occurs.
     */
    public function getFlightsByAircraft(string $icao24, int $begin, int $end): array;

    /**
     * Returns flights which arrived at a certain airport within a given time interval.
     *
     * @param string $airport The ICAO code of the airport.
     * @param int    $begin   The timestamp corresponding to the begining of the time interval.
     * @param int    $end     The timestamp corresponding to the end of the time interval.
     *
     * @return FlightInterface[]
     *
     * @throws BadCredentialsException   If the provided credentials are invalid.
     * @throws \InvalidArgumentException If any parameter is invalid.
     * @throws \Exception                If any other error occurs.
     */
    public function getFlightsByArrivalAirport(string $airport, int $begin, int $end): array;

    /**
     * Returns flights which departed from a certain airport within a given time interval.
     *
     * @param string $airport The ICAO code of the airport.
     * @param int    $begin   The timestamp corresponding to the begining of the time interval.
     * @param int    $end     The timestamp corresponding to the end of the time interval.
     *
     * @return FlightInterface[]
     *
     * @throws BadCredentialsException   If the provided credentials are invalid.
     * @throws \InvalidArgumentException If any parameter is invalid.
     * @throws \Exception                If any other error occurs.
     */
    public function getFlightsByDepartureAirport(string $airport, int $begin, int $end): array;

    /**
     * Returns a collection of state vectors.
     *
     * @param array $parameters An optional array of parameters.
     *
     * @return StateCollectionInterface
     *
     * @throws BadCredentialsException   If the provided credentials are invalid.
     * @throws \InvalidArgumentException If any parameter is invalid.
     * @throws \Exception                If any other error occurs.
     */
    public function getStates(array $parameters = []): StateCollectionInterface;

    /**
     * Returns a collection of state vectors, limited to your own sensors.
     *
     * @param array $parameters An optional array parameters.
     *
     * @return StateCollectionInterface
     *
     * @throws AuthenticationRequiredException If no credentials were provided.
     * @throws BadCredentialsException         If the provided credentials are invalid.
     * @throws \InvalidArgumentException       If any parameter is invalid.
     * @throws \Exception                      If any other error occurs.
     */
    public function getOwnStates(array $parameters = []): StateCollectionInterface;

    /**
     * Returns a collection of waypoints for a certain aircraft, at a given time.
     *
     * @param string   $icao24 The ICAO 24-bit address of the aircraft, in hexadecimal string representation.
     * @param int|null $time   An optional timestamp. It can be any time between the start and end of a known flight.
     *                         If omitted, the live track will be returned track if there is any flight ongoing for
     *                         the given aircraft.
     *
     * @return WaypointCollectionInterface|null A collection of waypoints, or null if no data is available.
     *
     * @throws BadCredentialsException   If the provided credentials are invalid.
     * @throws \InvalidArgumentException If any parameter is invalid.
     * @throws \Exception                If any other error occurs.
     */
    public function getTrack(string $icao24, int $time = null): ?WaypointCollectionInterface;

    /**
     * Returns the currently supported API version.
     *
     * @return string
     */
    public function getVersion(): string;
}
