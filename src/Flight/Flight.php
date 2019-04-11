<?php

namespace OpenSkyApi\Flight;

/**
 * Class Flight
 * @package OpenSkyApi\Flight
 */
class Flight implements FlightInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * Flight constructor.
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
    public function getArrivalAirport(): ?string
    {
        if (!is_null($this->data['estArrivalAirport'])) {
            return strval($this->data['estArrivalAirport']);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getArrivalAirportCandidatesCount(): int
    {
        return intval($this->data['arrivalAirportCandidatesCount']);
    }

    /**
     * {@inheritDoc}
     */
    public function getArrivalAirportHorizontalDistance(): ?int
    {
        if (!is_null($this->data['estArrivalAirportHorizDistance'])) {
            return intval($this->data['estArrivalAirportHorizDistance']);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getArrivalAirportVerticalDistance(): ?int
    {
        if (!is_null($this->data['estArrivalAirportVertDistance'])) {
            return intval($this->data['estArrivalAirportVertDistance']);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getArrivalTime(): int
    {
        return intval($this->data['lastSeen']);
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
    public function getDepartureAirport(): ?string
    {
        if (!is_null($this->data['estDepartureAirport'])) {
            return strval($this->data['estDepartureAirport']);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartureAirportCandidatesCount(): int
    {
        return intval($this->data['departureAirportCandidatesCount']);
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartureAirportHorizontalDistance(): ?int
    {
        if (!is_null($this->data['estDepartureAirportHorizDistance'])) {
            return intval($this->data['estDepartureAirportHorizDistance']);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartureAirportVerticalDistance(): ?int
    {
        if (!is_null($this->data['estDepartureAirportVertDistance'])) {
            return intval($this->data['estDepartureAirportVertDistance']);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartureTime(): int
    {
        return intval($this->data['firstSeen']);
    }

    /**
     * {@inheritDoc}
     */
    public function getICAO24(): string
    {
        return strval($this->data['icao24']);
    }
}
