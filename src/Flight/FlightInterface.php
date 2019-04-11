<?php

namespace OpenSkyApi\Flight;

/**
 * Interface FlightInterface
 * @package OpenSkyApi\Flight
 */
interface FlightInterface
{
    /**
     * Returns the ICAO code of the estimated arrival airport.
     *
     * @return string|null The ICAO code of the airport, or null if the airport can not be identified.
     */
    public function getArrivalAirport(): ?string;

    /**
     * Returns the number of other possible arrival airports.
     *
     * @return int
     */
    public function getArrivalAirportCandidatesCount(): int;

    /**
     * Returns the horizontal distance from the aircraft to its estimated arrival airport, in meters.
     *
     * @return int|null The distance, or null if the arrival airport can not be identified.
     */
    public function getArrivalAirportHorizontalDistance(): ?int;

    /**
     * Returns the vertical distance from the aircraft to its estimated arrival airport, in meters.
     *
     * @return int|null The distance, or null if the arrival airport can not be identified.
     */
    public function getArrivalAirportVerticalDistance(): ?int;

    /**
     * Returns the timestamp corresponding to the estimated arrival time of the aircraft.
     *
     * @return int
     */
    public function getArrivalTime(): int;

    /**
     * Returns the callsign of the aircraft.
     *
     * @return string|null The callsign, or null if no data is available.
     */
    public function getCallsign(): ?string;

    /**
     * Return the ICAO code of the estimated departure airport.
     *
     * @return string|null The ICAO code of the airport, or null if the departure airport can not be identified.
     */
    public function getDepartureAirport(): ?string;

    /**
     * Returns the number of other possible departure airports.
     *
     * @return int
     */
    public function getDepartureAirportCandidatesCount(): int;

    /**
     * Returns the horizontal distance from the aircraft to its estimated departure airport, in meters.
     *
     * @return int|null The distance, or null if the departure airport can not be identified.
     */
    public function getDepartureAirportHorizontalDistance(): ?int;

    /**
     * Returns the vertical distance from the aircraft to its estimated departure airport, in meters.
     *
     * @return int|null The distance, or null if the departure airport can not be identified.
     */
    public function getDepartureAirportVerticalDistance(): ?int;

    /**
     * Returns the timestamp corresponding to the estimated departure time of the aircraft.
     *
     * @return int
     */
    public function getDepartureTime(): int;

    /**
     * Returns the unique ICAO 24-bit address of the aircraft transponder, in hexadecimal string representation.
     *
     * @return string
     */
    public function getICAO24(): string;
}
