<?php
/**
 * @author  Jérémie BROUTIER <jeremie.broutier@gmail.com>
 * @license MIT
 */

namespace OpenSkyApi\Waypoint;

/**
 * Class Waypoint
 *
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
        if ( ! is_null($this->data[3])) {
            return floatval($this->data[3]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getHeading(): ?float
    {
        if ( ! is_null($this->data[4])) {
            return floatval($this->data[4]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude(): ?float
    {
        if ( ! is_null($this->data[1])) {
            return floatval($this->data[1]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude(): ?float
    {
        if ( ! is_null($this->data[2])) {
            return floatval($this->data[2]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getTime(): int
    {
        return intval($this->data[0]);
    }

    /**
     * {@inheritDoc}
     */
    public function isOnGround(): bool
    {
        return boolval($this->data[5]);
    }
}
