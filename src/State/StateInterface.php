<?php
/**
 * @author  Jérémie BROUTIER <jeremie.broutier@gmail.com>
 * @license MIT
 */

namespace OpenSkyApi\State;

/**
 * Interface StateInterface
 *
 * @package OpenSkyApi\State
 */
interface StateInterface
{
    /**
     * Returns the barometric altitude of the aircraft, in meters.
     *
     * @return float|null The altitude, or null if no data is available.
     */
    public function getBarometricAltitude(): ?float;

    /**
     * Returns the callsign of the aircraft.
     *
     * @return string|null The callsign, or null if no data is available.
     */
    public function getCallsign(): ?string;

    /**
     * Returns the geometric altitude of the aircraft, in meters.
     *
     * @return float|null The altitude, or null if no data is available.
     */
    public function getGeometricAltitude(): ?float;

    /**
     * Returns the ground speed of the aircraft, in meters per second.
     *
     * @return float|null The ground speed, or null if no data is available.
     */
    public function getGroundSpeed(): ?float;

    /**
     * Returns the heading of the aircraft, in decimal degrees.
     *
     * @return float|null The heading, or null if no data is available.
     */
    public function getHeading(): ?float;

    /**
     * Returns the unique ICAO 24-bit address of the aircraft transponder, in hexadecimal string representation.
     *
     * @return string
     */
    public function getICAO24(): string;

    /**
     * Returns the timestamp of the last message received from the aircraft.
     *
     * @return int
     */
    public function getLastContact(): int;

    /**
     * Returns the latitude of the aircraft in the WGS 84 coordinates system, in decimal degrees.
     *
     * @return float|null The latitude, or null if no data is available.
     */
    public function getLatitude(): ?float;

    /**
     * Returns the longitude of the aircraft in the WGS 84 coordinates system, in decimal degrees.
     *
     * @return float|null The longitude, or null if no data is available.
     */
    public function getLongitude(): ?float;

    /**
     * Returns true if the aircraft is on ground.
     *
     * @return bool
     */
    public function isOnGround(): bool;

    /**
     * Returns the country of origin of the aircraft, inferred from the ICAO 24-bit address.
     *
     * @return string
     */
    public function getOriginCountry(): string;

    /**
     * Returns the origin of the aircraft position report.
     *
     * The origin is represented by one of the following numeric values:
     * - 0: ADS-B
     * - 1: ASTERIX
     * - 2: MLAT
     * - 3: FLARM
     *
     * @return int
     */
    public function getPositionSource(): int;

    /**
     * Returns the IDs of sensors which contributed to this state report.
     *
     * @return int[]
     */
    public function getSensors(): array;

    /**
     * Returns true if flight status indicates special purpose indicator.
     *
     * @return bool
     */
    public function isSpi(): bool;

    /**
     * Returns the transponder code of the aircraft, aka "Squawk".
     *
     * @return string|null The transponder code, or null if no data is available.
     */
    public function getSquawk(): ?string;

    /**
     * Returns the timestamp of the last position report.
     *
     * @return int|null The timestamp, or null if no data was received within the 15 last seconds.
     */
    public function getTimePosition(): ?int;

    /**
     * Returns the vertical speed of the aircraft, in meters per second.
     *
     * @return float|null The vertical speed, or null if no data is available.
     */
    public function getVerticalSpeed(): ?float;
}
