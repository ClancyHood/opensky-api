<?php
/**
 * @author  Jérémie BROUTIER <jeremie.broutier@gmail.com>
 * @license MIT
 */

namespace OpenSkyApi\State;

/**
 * Class State
 *
 * @package OpenSkyApi\State
 */
class State implements StateInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * State constructor.
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
        if ( ! is_null($this->data[7])) {
            return floatval($this->data[7]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCallsign(): ?string
    {
        if ( ! is_null($this->data[1])) {
            return strval($this->data[1]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getGeometricAltitude(): ?float
    {
        if ( ! is_null($this->data[13])) {
            return floatval($this->data[13]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getGroundSpeed(): ?float
    {
        if ( ! is_null($this->data[9])) {
            return floatval($this->data[9]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getHeading(): ?float
    {
        if ( ! is_null($this->data[10])) {
            return floatval($this->data[10]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getICAO24(): string
    {
        return strval($this->data[0]);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastContact(): int
    {
        return intval($this->data[4]);
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude(): ?float
    {
        if ( ! is_null($this->data[6])) {
            return floatval($this->data[6]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude(): ?float
    {
        if ( ! is_null($this->data[5])) {
            return floatval($this->data[5]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function isOnGround(): bool
    {
        return boolval($this->data[8]);
    }

    /**
     * {@inheritDoc}
     */
    public function getOriginCountry(): string
    {
        return strval($this->data[2]);
    }

    /**
     * {@inheritDoc}
     */
    public function getPositionSource(): int
    {
        return intval($this->data[16]);
    }

    /**
     * {@inheritDoc}
     */
    public function getSensors(): array
    {
        return array_map('intval', (array)$this->data[12]);
    }

    /**
     * {@inheritDoc}
     */
    public function isSpi(): bool
    {
        return boolval($this->data[15]);
    }

    /**
     * {@inheritDoc}
     */
    public function getSquawk(): ?string
    {
        if ( ! is_null($this->data[14])) {
            return strval($this->data[14]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getTimePosition(): ?int
    {
        if ( ! is_null($this->data[3])) {
            return intval($this->data[3]);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getVerticalSpeed(): ?float
    {
        if ( ! is_null($this->data[11])) {
            return floatval($this->data[11]);
        }

        return null;
    }
}
