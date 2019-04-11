<?php
/**
 * @author  Jérémie BROUTIER <jeremie.broutier@gmail.com>
 * @license MIT
 */

namespace OpenSkyApi\Waypoint;

/**
 * Interface WaypointInterface
 * @package OpenSkyApi\Waypoint
 */
interface WaypointInterface
{
    /**
     * Returns the barometric altitude of the aircraft, in meters.
     *
     * @return float|null The altitude, or null if no data is available.
     */
    public function getBarometricAltitude(): ?float;

    /**
     * Returns the heading of the aircraft, in decimal degrees.
     *
     * @return float|null The heading, or null if no data is available.
     */
    public function getHeading(): ?float;

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
     * Returns the timestamp corresponding to the the waypoint.
     *
     * @return int
     */
    public function getTime(): int;
}
