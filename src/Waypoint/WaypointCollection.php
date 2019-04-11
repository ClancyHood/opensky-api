<?php
/**
 * @author  Jérémie BROUTIER <jeremie.broutier@gmail.com>
 * @license MIT
 */

namespace OpenSkyApi\Waypoint;

/**
 * Class WaypointCollection
 * @package OpenSkyApi\Waypoint
 */
class WaypointCollection implements WaypointCollectionInterface, \Countable, \Iterator
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var WaypointInterface[]
     */
    protected $waypoints;

    /**
     * WaypointCollection constructor.
     *
     * @param array $data Data received from the API.
     */
    public function __construct(array $data = [])
    {
        $this->data      = $data;
        $this->position  = 0;
        $this->waypoints = [];

        if (array_key_exists('path', $this->data) and is_array($this->data['path'])) {
            foreach ($this->data['path'] as $waypoint) {
                $this->waypoints[] = new Waypoint($waypoint);
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getCallsign(): ?string
    {
        if (!is_null($this->data['callsign'])) {
            return strval($this->data['callsign']);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getEndTime(): int
    {
        return intval($this->data['endTime']);
    }

    /**
     * {@inheritDoc}
     */
    public function getICAO24(): string
    {
        return strval($this->data['icao24']);
    }

    /**
     * {@inheritDoc}
     */
    public function getStartTime(): int
    {
        return intval($this->data['startTime']);
    }

    /**
     * {@inheritDoc}
     */
    public function getWaypoints(): array
    {
        return $this->waypoints;
    }

    public function count(): int
    {
        return count($this->waypoints);
    }

    public function current(): WaypointInterface
    {
        return $this->waypoints[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->waypoints[$this->position]);
    }
}
