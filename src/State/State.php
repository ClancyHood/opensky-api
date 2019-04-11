<?php

namespace OpenSkyApi\State;

/**
 * Class State
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
        return $this->data[7];
    }

    /**
     * {@inheritDoc}
     */
    public function getCallsign(): ?string
    {
        return $this->data[1];
    }

    /**
     * {@inheritDoc}
     */
    public function getGeometricAltitude(): ?float
    {
        return $this->data[13];
    }

    /**
     * {@inheritDoc}
     */
    public function getGroundSpeed(): ?float
    {
        return $this->data[9];
    }

    /**
     * {@inheritDoc}
     */
    public function getHeading(): ?float
    {
        return $this->data[10];
    }

    /**
     * {@inheritDoc}
     */
    public function getICAO24(): string
    {
        return $this->data[0];
    }

    /**
     * {@inheritDoc}
     */
    public function getLastContact(): int
    {
        return $this->data[4];
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude(): ?float
    {
        return $this->data[6];
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude(): ?float
    {
        return $this->data[5];
    }

    /**
     * {@inheritDoc}
     */
    public function isOnGround(): bool
    {
        return $this->data[8];
    }

    /**
     * {@inheritDoc}
     */
    public function getOriginCountry(): string
    {
        return $this->data[2];
    }

    /**
     * {@inheritDoc}
     */
    public function getPositionSource(): int
    {
        return $this->data[16];
    }

    /**
     * {@inheritDoc}
     */
    public function getSensors(): array
    {
        return (array)$this->data[12];
    }

    /**
     * {@inheritDoc}
     */
    public function isSpi(): bool
    {
        return $this->data[15];
    }

    /**
     * {@inheritDoc}
     */
    public function getSquawk(): ?string
    {
        return $this->data[14];
    }

    /**
     * {@inheritDoc}
     */
    public function getTimePosition(): ?int
    {
        return $this->data[3];
    }

    /**
     * {@inheritDoc}
     */
    public function getVerticalSpeed(): ?float
    {
        return $this->data[11];
    }
}
