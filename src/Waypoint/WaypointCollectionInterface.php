<?php

namespace OpenSkyApi\Waypoint;

/**
 * Interface WaypointCollectionInterface
 * @package OpenSkyApi\Waypoint
 */
interface WaypointCollectionInterface
{
    /**
     * Returns the callsign of the aircraft.
     *
     * @return string|null The callsign, or null if no data is available.
     */
    public function getCallsign(): ?string;

    /**
     * Returns the timestamp corresponding to the last waypoint.
     *
     * @return int
     */
    public function getEndTime(): int;

    /**
     * Returns the unique ICAO 24-bit address of the aircraft transponder, in hexadecimal string representation.
     *
     * @return string
     */
    public function getICAO24(): string;

    /**
     * Returns the timestamp corresponding to the first waypoint.
     *
     * @return int
     */
    public function getStartTime(): int;

    /**
     * Returns the list of waypoints.
     *
     * @return WaypointInterface[]
     */
    public function getWaypoints(): array;
}
