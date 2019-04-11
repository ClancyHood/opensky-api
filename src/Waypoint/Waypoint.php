<?php

namespace OpenSkyApi\Waypoint;

/**
 * Class Waypoint
 * @package OpenSkyApi\Waypoint
 */
class Waypoint implements WaypointInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * Waypoint constructor.
     *
     * @param array $data Data received from the API.
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * {@inheritDoc}
     */
    public function getBarometricAltitude(): ?float
    {
        return $this->data[3];
    }

    /**
     * {@inheritDoc}
     */
    public function getHeading(): ?float
    {
        return $this->data[4];
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude(): ?float
    {
        return $this->data[1];
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude(): ?float
    {
        return $this->data[2];
    }

    /**
     * {@inheritDoc}
     */
    public function getTime(): int
    {
        return $this->data[0];
    }

    /**
     * {@inheritDoc}
     */
    public function isOnGround(): bool
    {
        return $this->data[5];
    }
}
