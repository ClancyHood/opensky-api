<?php

namespace OpenSkyApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use OpenSkyApi\Exception\AuthenticationRequiredException;
use OpenSkyApi\Exception\BadCredentialsException;
use OpenSkyApi\Flight\Flight;
use OpenSkyApi\State\StateCollection;
use OpenSkyApi\State\StateCollectionInterface;
use OpenSkyApi\Waypoint\WaypointCollection;
use OpenSkyApi\Waypoint\WaypointCollectionInterface;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;

/**
 * Class OpenSkyApi
 * @package OpenSkyApi
 */
class OpenSkyApi implements OpenSkyApiInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Validation
     */
    protected $validator;

    /**
     * @var string
     */
    protected static $version = '1.4';

    /**
     * {@inheritDoc}
     */
    public function __construct(string $username = null, string $password = null)
    {
        $auth = (!is_null($username) and !is_null($password)) ? [$username, $password] : [];

        $this->validator = Validation::createValidator();
        $this->client    = new Client([
            'auth'        => $auth,
            'base_uri'    => 'https://opensky-network.org',
            'http_errors' => true,
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function getFlights(int $begin, int $end): array
    {
        $violations = new ConstraintViolationList();
        $violations->addAll($this->validator->validate($end - $begin, [
            new LessThanOrEqual([
                'value'   => 7200,
                'message' => 'The time interval exceeds the maximum allowed of 2 hours.',
            ]),
        ]));

        foreach ($violations as $violation) {
            throw new \InvalidArgumentException($violation->getMessage());
        }

        $query = [
            'begin' => $begin,
            'end'   => $end,
        ];

        try {
            $response = $this->client->request('GET', '/api/flights/all', ['query' => $query]);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    throw new BadCredentialsException($exception->getMessage(), $exception->getCode());
                    break;

                case 404:
                    return [];
                    break;

                default:
                    throw new \Exception($exception->getMessage(), $exception->getCode());
                    break;
            }
        }

        $data    = $this->parseJson($response->getBody());
        $flights = [];

        foreach ($data as $flight) {
            $flights[] = new Flight($flight);
        }

        return $flights;
    }

    /**
     * {@inheritDoc}
     */
    public function getFlightsByAircraft(string $icao24, int $begin, int $end): array
    {
        $violations = new ConstraintViolationList();
        $violations->addAll($this->validator->validate($icao24, [
            new NotBlank([
                'message' => 'An empty value is not allowed for the `icao24` parameter.',
            ]),
            new Regex([
                'pattern' => '/^[a-f0-9]{6}$/i',
                'message' => '{{ value }} is not a valid ICAO 24-bit address for the `icao24` parameter.',
            ]),
        ]));

        $violations->addAll($this->validator->validate($end - $begin, [
            new LessThanOrEqual([
                'value'   => 2592000,
                'message' => 'The time interval exceeds the maximum allowed of 30 days.',
            ]),
        ]));

        foreach ($violations as $violation) {
            throw new \InvalidArgumentException($violation->getMessage());
        }

        $query = [
            'icao24' => strtolower($icao24),
            'begin'  => $begin,
            'end'    => $end,
        ];

        try {
            $response = $this->client->request('GET', '/api/flights/aircraft', ['query' => $query]);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    throw new BadCredentialsException($exception->getMessage(), $exception->getCode());
                    break;

                case 404:
                    return [];
                    break;

                default:
                    throw new \Exception($exception->getMessage(), $exception->getCode());
                    break;
            }
        }

        $data    = $this->parseJson($response->getBody());
        $flights = [];

        foreach ($data as $flight) {
            $flights[] = new Flight($flight);
        }

        return $flights;
    }

    /**
     * {@inheritDoc}
     */
    public function getFlightsByArrivalAirport(string $airport, int $begin, int $end): array
    {
        $violations = new ConstraintViolationList();
        $violations->addAll($this->validator->validate($airport, [
            new NotBlank([
                'message' => 'An empty value is not allowed for the `airport` parameter.',
            ]),
            new Regex([
                'pattern' => '/^[a-z]{4}$/i',
                'message' => '{{ value }} is not a valid ICAO airport code for the `airport` parameter.',
            ]),
        ]));

        $violations->addAll($this->validator->validate($end - $begin, [
            new LessThanOrEqual([
                'value'   => 604800,
                'message' => 'The time interval exceeds the maximum allowed of 7 days.',
            ]),
        ]));

        foreach ($violations as $violation) {
            throw new \InvalidArgumentException($violation->getMessage());
        }

        $query = [
            'airport' => strtoupper($airport),
            'begin'   => $begin,
            'end'     => $end,
        ];

        try {
            $response = $this->client->request('GET', '/api/flights/arrival', ['query' => $query]);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    throw new BadCredentialsException($exception->getMessage(), $exception->getCode());
                    break;

                case 404:
                    return [];
                    break;

                default:
                    throw new \Exception($exception->getMessage(), $exception->getCode());
                    break;
            }
        }

        $data    = $this->parseJson($response->getBody());
        $flights = [];

        foreach ($data as $flight) {
            $flights[] = new Flight($flight);
        }

        return $flights;
    }

    /**
     * {@inheritDoc}
     */
    public function getFlightsByDepartureAirport(string $airport, int $begin, int $end): array
    {
        $violations = new ConstraintViolationList();
        $violations->addAll($this->validator->validate($airport, [
            new NotBlank([
                'message' => 'An empty value is not allowed for the `airport` parameter.',
            ]),
            new Regex([
                'pattern' => '/^[a-z]{4}$/i',
                'message' => '{{ value }} is not a valid ICAO airport code for the `airport` parameter.',
            ]),
        ]));

        $violations->addAll($this->validator->validate($end - $begin, [
            new LessThanOrEqual([
                'value'   => 604800,
                'message' => 'The time interval exceeds the maximum allowed of 7 days.',
            ]),
        ]));

        foreach ($violations as $violation) {
            throw new \InvalidArgumentException($violation->getMessage());
        }

        $query = [
            'airport' => strtoupper($airport),
            'begin'   => $begin,
            'end'     => $end,
        ];

        try {
            $response = $this->client->request('GET', '/api/flights/departure', ['query' => $query]);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    throw new BadCredentialsException($exception->getMessage(), $exception->getCode());
                    break;

                case 404:
                    return [];
                    break;

                default:
                    throw new \Exception($exception->getMessage(), $exception->getCode());
                    break;
            }
        }

        $data    = $this->parseJson($response->getBody());
        $flights = [];

        foreach ($data as $flight) {
            $flights[] = new Flight($flight);
        }

        return $flights;
    }

    /**
     * {@inheritDoc}
     */
    public function getOwnStates(array $parameters = []): StateCollectionInterface
    {
        $violations = new ConstraintViolationList();

        if (array_key_exists('icao24', $parameters)) {
            $violations->addAll($this->validator->validate($parameters['icao24'], [
                new Type([
                    'type'    => 'array',
                    'message' => '{{ value }} is not a valid {{ type }} value for the `icao24` parameter.',
                ]),
                new All([
                    'constraints' => [
                        new NotBlank([
                            'message' => 'An empty value is not allowed for the `icao24` parameter.',
                        ]),
                        new Type([
                            'type'    => 'string',
                            'message' => '{{ value }} is not a valid {{ type }} value for the `icao24` parameter.',
                        ]),
                        new Regex([
                            'pattern' => '/^[a-f0-9]{6}$/i',
                            'message' => '{{ value }} is not a valid ICAO 24-bit address for the `icao24` parameter.',
                        ]),
                    ],
                ]),
            ]));
        }

        if (array_key_exists('time', $parameters)) {
            $violations->addAll($this->validator->validate($parameters['time'], [
                new Type([
                    'type'    => 'int',
                    'message' => '{{ value }} is not a valid {{ type }} value for the `time` parameter.',
                ]),
                new GreaterThanOrEqual([
                    'value'   => time() - 3600,
                    'message' => '{{ value }} is more than 1 hour in the past for the `time` parameter.',
                ]),
            ]));
        }

        if (array_key_exists('serials', $parameters)) {
            $violations->addAll($this->validator->validate($parameters['serials'], [
                new Type([
                    'type'    => 'array',
                    'message' => '{{ value }} is not a valid {{ type }} value for the `serials` parameter.',
                ]),
                new All([
                    'constraints' => [
                        new NotBlank([
                            'message' => 'An empty value is not allowed for the `serials` parameter.',
                        ]),
                        new Type([
                            'type'    => 'int',
                            'message' => '{{ value }} is not a valid {{ type }} value for the `serials` parameter.',
                        ]),
                    ],
                ]),
            ]));
        }

        foreach ($violations as $violation) {
            throw new \InvalidArgumentException($violation->getMessage());
        }

        if (array_key_exists('icao24', $parameters)) {
            $parameters['icao24'] = strtolower(implode(',', $parameters['icao24']));
        }

        if (array_key_exists('serials', $parameters)) {
            $parameters['serials'] = implode(',', $parameters['serials']);
        }

        try {
            $response = $this->client->request('GET', '/api/states/own', ['query' => $parameters]);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    throw new BadCredentialsException($exception->getMessage(), $exception->getCode());
                    break;

                case 403:
                    throw new AuthenticationRequiredException($exception->getMessage(), $exception->getCode());
                    break;

                default:
                    throw new \Exception($exception->getMessage(), $exception->getCode());
                    break;
            }
        }

        $data = $this->parseJson($response->getBody());

        return new StateCollection($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getStates(array $parameters = []): StateCollectionInterface
    {
        $violations = new ConstraintViolationList();

        if (array_key_exists('icao24', $parameters)) {
            $violations->addAll($this->validator->validate($parameters['icao24'], [
                new Type([
                    'type'    => 'array',
                    'message' => '{{ value }} is not a valid {{ type }} value for the `icao24` parameter.',
                ]),
                new All([
                    'constraints' => [
                        new NotBlank([
                            'message' => 'An empty value is not allowed for the `icao24` parameter.',
                        ]),
                        new Type([
                            'type'    => 'string',
                            'message' => '{{ value }} is not a valid {{ type }} value for the `icao24` parameter.',
                        ]),
                        new Regex([
                            'pattern' => '/^[a-f0-9]{6}$/i',
                            'message' => '{{ value }} is not a valid ICAO 24-bit address for the `icao24` parameter.',
                        ]),
                    ],
                ]),
            ]));
        }

        if (array_key_exists('time', $parameters)) {
            $violations->addAll($this->validator->validate($parameters['time'], [
                new Type([
                    'type'    => 'int',
                    'message' => '{{ value }} is not a valid {{ type }} value for the `time` parameter.',
                ]),
                new GreaterThanOrEqual([
                    'value'   => time() - 3600,
                    'message' => '{{ value }} is more than 1 hour in the past for the `time` parameter.',
                ]),
            ]));
        }

        if (array_key_exists('lamin', $parameters)) {
            $violations->addAll($this->validator->validate($parameters['lamin'], [
                new Type([
                    'type'    => 'float',
                    'message' => '{{ value }} is not a valid {{ type }} value for the `lamin` parameter.',
                ]),
                new Range([
                    'min'        => -90,
                    'minMessage' => '{{ value }} is not within the valid range [-90,90] for the `lamin` parameter.',
                    'max'        => 90,
                    'maxMessage' => '{{ value }} is not within the valid range [-90,90] for the `lamin` parameter.',
                ]),
            ]));
        }

        if (array_key_exists('lomin', $parameters)) {
            $violations->addAll($this->validator->validate($parameters['lomin'], [
                new Type([
                    'type'    => 'float',
                    'message' => '{{ value }} is not a valid {{ type }} value for the `lomin` parameter.',
                ]),
                new Range([
                    'min'        => -180,
                    'minMessage' => '{{ value }} is not within the valid range [-180,180] for the `lomin` parameter.',
                    'max'        => 180,
                    'maxMessage' => '{{ value }} is not within the valid range [-180,180] for the `lomin` parameter.',
                ]),
            ]));
        }

        if (array_key_exists('lamax', $parameters)) {
            $violations->addAll($this->validator->validate($parameters['lamax'], [
                new Type([
                    'type'    => 'float',
                    'message' => '{{ value }} is not a valid {{ type }} value for the `lamax` parameter.',
                ]),
                new Range([
                    'min'        => -90,
                    'minMessage' => '{{ value }} is not within the valid range [-90,90] for the `lamax` parameter.',
                    'max'        => 90,
                    'maxMessage' => '{{ value }} is not within the valid range [-90,90] for the `lamax` parameter.',
                ]),
            ]));
        }

        if (array_key_exists('lomax', $parameters)) {
            $violations->addAll($this->validator->validate($parameters['lomax'], [
                new Type([
                    'type'    => 'float',
                    'message' => '{{ value }} is not a valid {{ type }} value for the `lomax` parameter.',
                ]),
                new Range([
                    'min'        => -180,
                    'minMessage' => '{{ value }} is not within the valid range [-180,180] for the `lomax` parameter.',
                    'max'        => 180,
                    'maxMessage' => '{{ value }} is not within the valid range [-180,180] for the `lomax` parameter.',
                ]),
            ]));
        }

        foreach ($violations as $violation) {
            throw new \InvalidArgumentException($violation->getMessage());
        }

        if (array_key_exists('icao24', $parameters)) {
            $parameters['icao24'] = strtolower(implode(',', $parameters['icao24']));
        }

        try {
            $response = $this->client->request('GET', '/api/states/all', ['query' => $parameters]);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    throw new BadCredentialsException($exception->getMessage(), $exception->getCode());
                    break;

                default:
                    throw new \Exception($exception->getMessage(), $exception->getCode());
                    break;
            }
        }

        $data = $this->parseJson($response->getBody());

        return new StateCollection($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getTrack(string $icao24, int $time = null): ?WaypointCollectionInterface
    {
        $violations = new ConstraintViolationList();
        $violations->addAll($this->validator->validate($icao24, [
            new NotBlank([
                'message' => 'An empty value is not allowed for the `icao24` parameter.',
            ]),
            new Regex([
                'pattern' => '/^[a-f0-9]{6}$/i',
                'message' => '{{ value }} is not a valid ICAO 24-bit address for the `icao24` parameter.',
            ]),
        ]));

        $violations->addAll($this->validator->validate($time, [
            new GreaterThanOrEqual([
                'value'   => time() - 2592000,
                'message' => '{{ value }} is more than 30 days in the past for the `time` parameter.',
            ]),
        ]));

        foreach ($violations as $violation) {
            throw new \InvalidArgumentException($violation->getMessage());
        }

        try {
            $response = $this->client->request('GET', '/api/tracks/all', [
                'query' => [
                    'icao24' => strtolower($icao24),
                    'time'   => $time ?? 0,
                ],
            ]);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 401:
                    throw new BadCredentialsException($exception->getMessage(), $exception->getCode());
                    break;

                case 404:
                    return null;
                    break;

                default:
                    throw new \Exception($exception->getMessage(), $exception->getCode());
                    break;
            }
        }

        $data = $this->parseJson($response->getBody());

        return new WaypointCollection($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion(): string
    {
        return self::$version;
    }

    /**
     * @param string $json
     * @return array
     * @throws \Exception
     */
    protected function parseJson(string $json): array
    {
        try {
            return json_decode($json, true, 8, JSON_THROW_ON_ERROR);
        } catch (\JsonException $exception) {
            throw new \Exception($exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}
