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
        return $this->data['estArrivalAirport'];
    }

    /**
     * {@inheritDoc}
     */
    public function getArrivalAirportCandidatesCount(): int
    {
        return $this->data['arrivalAirportCandidatesCount'];
    }

    /**
     * {@inheritDoc}
     */
    public function getArrivalAirportHorizontalDistance(): ?int
    {
        return $this->data['estArrivalAirportHorizDistance'];
    }

    /**
     * {@inheritDoc}
     */
    public function getArrivalAirportVerticalDistance(): ?int
    {
        return $this->data['estArrivalAirportVertDistance'];
    }

    /**
     * {@inheritDoc}
     */
    public function getArrivalTime(): int
    {
        return $this->data['lastSeen'];
    }

    /**
     * {@inheritDoc}
     */
    public function getCallsign(): ?string
    {
        return $this->data['callsign'];
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartureAirport(): ?string
    {
        return $this->data['estDepartureAirport'];
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartureAirportCandidatesCount(): int
    {
        return $this->data['departureAirportCandidatesCount'];
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartureAirportHorizontalDistance(): ?int
    {
        return $this->data['estDepartureAirportHorizDistance'];
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartureAirportVerticalDistance(): ?int
    {
        return $this->data['estDepartureAirportVertDistance'];
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartureTime(): int
    {
        return $this->data['firstSeen'];
    }

    /**
     * {@inheritDoc}
     */
    public function getICAO24(): string
    {
        return $this->data['icao24'];
    }
}
