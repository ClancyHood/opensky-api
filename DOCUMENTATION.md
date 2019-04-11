# Documentation



## OpenSkyApi\OpenSkyApi

#### Constructor

```php
public function __construct(string $username = null, string $password = null)
```
##### Description
Creates an instance of the client.

##### Parameters
| Parameter | Type         | Description           |
| :-------- | ------------ | --------------------- |
| $username | string\|null | An optional username. |
| $password | string\|null | An optional password. |



### Flights

___

#### All flights

```php
public function getFlights(int $begin, int $end): array
```

##### Description
Returns all flights for a given time interval.

##### Parameters
| Parameter | Type | Description                                                  |
| --------- | ---- | ------------------------------------------------------------ |
| $begin    | int  | The timestamp corresponding to the begining of the time interval. |
| $end      | int  | The timestamp corresponding to the end of the time interval. |

##### Returned value

An array of `Flight` objects.

##### Exceptions

| Type                      | Description                              |
| ------------------------- | ---------------------------------------- |
| BadCredentialsException   | If the provided credentials are invalid. |
| \InvalidArgumentException | If any parameter is invalid.             |
| \Exception                | If any other error occurs.               |

##### Limitations

- The time interval must not be greater than 2 hours (7 200 seconds). If the provided time interval is greater than the limit, an `\InvalidArgumentException` is thrown.

___
#### Flights by aircraft

```php
public function getFlightsByAircraft(string $icao24, int $begin, int $end): array
```

##### Description

Returns flighs for a particular aircraft which departed or arrived within a given time interval.

##### Parameters

| Parameter | Type   | Description                                                  |
| --------- | ------ | ------------------------------------------------------------ |
| $icao24   | string | The ICAO 24-bit address of the aircraft, in hexadecimal string representation. |
| $begin    | int    | The timestamp corresponding to the begining of the time interval. |
| $end      | int    | The timestamp corresponding to the end of the time interval. |

##### Returned value

An array of `Flight` objects.

##### Exceptions

| Type                      | Description                              |
| ------------------------- | ---------------------------------------- |
| BadCredentialsException   | If the provided credentials are invalid. |
| \InvalidArgumentException | If any parameter is invalid.             |
| \Exception                | If any other error occurs.               |

##### Limitations

- The time interval must not be greater than 30 days (2 592 000 seconds). If the provided time interval is greater than the limit, an `\InvalidArgumentException` is thrown.

___
#### Fights by arrival airport

```php
public function getFlightsByArrivalAirport(string $airport, int $begin, int $end): array
```

##### Description

Returns flights which arrived at a certain airport within a given time interval.

##### Parameters

| Parameter | Type   | Description                                                  |
| --------- | ------ | ------------------------------------------------------------ |
| $airport  | string | The ICAO code of the airport.                                |
| $begin    | int    | The timestamp corresponding to the begining of the time interval. |
| $end      | int    | The timestamp corresponding to the end of the time interval. |

##### Returned value

An array of `Flight` objects.

##### Exceptions

| Type                      | Description                              |
| ------------------------- | ---------------------------------------- |
| BadCredentialsException   | If the provided credentials are invalid. |
| \InvalidArgumentException | If any parameter is invalid.             |
| \Exception                | If any other error occurs.               |

##### Limitations

- The time interval must not be greater than 7 days (604 800 seconds). If the provided time interval is greater than the limit, an `\InvalidArgumentException` is thrown.

___

#### Flights by departure airport

```php
public function getFlightsByDepartureAirport(string $airport, int $begin, int $end): array
```

##### Description

Returns flights which departed from a certain airport within a given time interval.

##### Parameters

| Parameter | Type   | Description                                                  |
| --------- | ------ | ------------------------------------------------------------ |
| $airport  | string | The ICAO code of the airport.                                |
| $begin    | int    | The timestamp corresponding to the begining of the time interval. |
| $end      | int    | The timestamp corresponding to the end of the time interval. |

##### Returned value

An array of `Flight` objects.

##### Exceptions

| Type                      | Description                              |
| ------------------------- | ---------------------------------------- |
| BadCredentialsException   | If the provided credentials are invalid. |
| \InvalidArgumentException | If any parameter is invalid.             |
| \Exception                | If any other error occurs.               |

##### Limitations

- The time interval must not be greater than 7 days (604 800 seconds). If the provided time interval is greater than the limit, an `\InvalidArgumentException` is thrown.


### State vectors

___

#### All state vectors

```php
public function getStates(array $parameters = []): StateCollection
```

##### Description

Returns a collection of state vectors.

##### Parameters

| Parameter   | Type  | Description                      |
| ----------- | ----- | -------------------------------- |
| $parameters | array | An optional array of parameters. |

The following key/value pairs are accepted:

| Key      | Type     | Description |
| -------- | -------- | ----------- |
| *icao24* | string[] |             |
| *time*   | int      |             |
| *lamin*  | float    |             |
| *lomin*  | float    |             |
| *lamax*  | float    |             |
| *lomax*  | float    |             |

##### Returned value

A `StateCollection` object.

##### Exceptions

| Type                      | Description                              |
| ------------------------- | ---------------------------------------- |
| BadCredentialsException   | If the provided credentials are invalid. |
| \InvalidArgumentException | If any parameter is invalid.             |
| \Exception                | If any other error occurs.               |

##### Limitations

- Anonymous users can only get the most recent state vectors, i.e. the `time` parameter will be ignored.
- Anonymous users can only retrieve data with a time resolution of 10 seconds.
- Authenticated users can retrieve data of up to 1 hour in the past. If the provided time interval is greater than the limit, an `\InvalidArgumentException` is thrown.
- Authenticated users can retrieve data with a time resolution of 5 seconds.
___

#### Own state vectors

```php
public function getOwnStates(array $parameters = []): StateCollection
```

##### Description

Returns a collection of state vectors, limited to your own sensors.

##### Parameters

| Parameter   | Type  | Description                      |
| ----------- | ----- | -------------------------------- |
| $parameters | array | An optional array of parameters. |

The following key/value pairs are accepted:

| Key       | Type     | Description |
| --------- | -------- | ----------- |
| *icao24*  | string[] |             |
| *time*    | int      |             |
| *serials* | int[]    |             |

##### Returned value

A `StateCollection` object.

##### Exceptions

| Type                            | Description                              |
| ------------------------------- | ---------------------------------------- |
| AuthenticationRequiredException | If no credentials were provided.         |
| BadCredentialsException         | If the provided credentials are invalid. |
| \InvalidArgumentException       | If any parameter is invalid.             |
| \Exception                      | If any other error occurs.               |



### Path

___

#### Path of an aircraft

```php
 public function getTrack(string $icao24, int $time = null): ?WaypointCollection
```

##### Description

Returns a collection of waypoints for a certain aircraft, at a given time.

##### Parameters

| Parameter | Type      | Description                                                  |
| --------- | --------- | ------------------------------------------------------------ |
| $icao24   | string    | The ICAO 24-bit address of the aircraft, in hexadecimal string representation. |
| $time     | int\|null | An optional timestamp.                                       |

*$time*

It can be any time between the start and end of a known flight. If omitted, the live track will be returned track if there is any flight ongoing for the given aircraft.

##### Returned value

A `WaypointCollection` object, or null if no data is available.

##### Exceptions

| Type                      | Description                              |
| ------------------------- | ---------------------------------------- |
| BadCredentialsException   | If the provided credentials are invalid. |
| \InvalidArgumentException | If any parameter is invalid.             |
| \Exception                | If any other error occurs.               |

##### Limitations

- The timestamp must not be more than 30 days (2 592 000 seconds) in the past. If the provided timestamp is older than the limit, an `\InvalidArgumentException` is thrown.



### Other 

___

#### API version

```php
public function getVersion(): string
```

##### Description

Returns the currently supported API version.



## OpenSkyApi\Flight\Flight

Represents a flight.



### Aircraft

------

#### Callsign

```php
public function getCallsign(): ?string
```

##### Description

Returns the callsign of the aircraft.

##### Returned value

The callsign, or null if no data is available.

___

#### Transponder address

```php
public function getICAO24(): string
```

##### Description

Returns the unique ICAO 24-bit address of the aircraft transponder, in hexadecimal string representation.



### Arrival airport

___
#### Estimated arrival airport
```php
public function getArrivalAirport(): ?string
```

##### Description

Returns the ICAO code of the estimated arrival airport.

##### Returned value

The ICAO code of the airport, or null if the airport can not be identified.

___
#### Other possible arrival airports
```php
public function getArrivalAirportCandidatesCount(): int
```

##### Description

Returns the number of other possible arrival airports.
___
#### Horizontal distance to estimated arrival airport
```php
public function getArrivalAirportHorizontalDistance(): ?int
```

##### Description

Returns the horizontal distance from the aircraft to its estimated arrival airport, in meters.

##### Returned value

The distance, or null if the arrival airport can not be identified.

------
#### Vertical distance to estimated arrival airport
```php
public function getArrivalAirportVerticalDistance(): ?int
```

##### Description

Returns the vertical distance from the aircraft to its estimated arrival airport, in meters.

##### Returned value

The distance, or null if the arrival airport can not be identified.

------
#### Estimated arrival time
```php
public function getArrivalTime(): int
```

##### Description

Returns the timestamp corresponding to the estimated arrival time of the aircraft.



### Departure airport

___

#### Estimated departure airport

```php
public function getDepartureAirport(): ?string
```

##### Description

Return the ICAO code of the estimated departure airport.

##### Returned value

The ICAO code of the airport, or null if the departure airport can not be identified.

___

#### Other possible departure airports

```php
public function getDepartureAirportCandidatesCount(): int
```

##### Description

Returns the number of other possible departure airports.

___

#### Horizontal distance to estimated departure airport

```php
public function getDepartureAirportHorizontalDistance(): ?int
```

##### Description

Returns the horizontal distance from the aircraft to its estimated departure airport, in meters.

##### Returned value

The distance, or null if the departure airport can not be identified.

___

#### Vertical distance to estimated departure airport

```php
public function getDepartureAirportVerticalDistance(): ?int
```

##### Description

Returns the vertical distance from the aircraft to its estimated departure airport, in meters.

##### Returned value

The distance, or null if the departure airport can not be identified.

___

#### Estimated departure time

```php
public function getDepartureTime(): int
```

##### Description

Returns the timestamp corresponding to the estimated departure time of the aircraft.



## OpenSkyApi\State\State

Represents a single state vector, i.e. the state of an aircraft at a certain time.



### Aircraft

___

#### Callsign

```php
public function getCallsign(): ?string
```

##### Description

Returns the callsign of the aircraft.

##### Returns

The callsign, or null if no data is available.

------

#### Transponder address

```php
public function getICAO24(): string
```

##### Description

Returns the unique ICAO 24-bit address of the aircraft transponder, in hexadecimal string representation.

___

#### Transponder code

```php
public function getSquawk(): ?string
```

##### Description

Returns the transponder code of the aircraft, aka "Squawk".

##### Returned value

The transponder code, or null if no data is available.

___

#### Origin country

```php
public function getOriginCountry(): string
```

##### Description

Returns the country of origin of the aircraft, inferred from the ICAO 24-bit address.



### Position, direction and velocity

___

#### Latitude

```php
public function getLatitude(): ?float
```

##### Description

Returns the latitude of the aircraft in the WGS 84 coordinates system, in decimal degrees.

##### Returned value

The latitude, or null if no data is available

------

#### Longitude

```php
public function getLongitude(): ?float
```

##### Description

Returns the longitude of the aircraft in the WGS 84 coordinates system, in decimal degrees.

##### Returns

The longitude, or null if no data is available.

___

#### Barometric altitude

```php
public function getBarometricAltitude(): ?float
```

##### Description

Returns the barometric altitude of the aircraft, in meters.

##### Returned value

The altitude, or null if no data is available.

___

#### Geometric altitude

```php
public function getGeometricAltitude(): ?float
```

##### Description

Returns the geometric altitude of the aircraft, in meters.

##### Returned value

The altitude, or null if no data is available.

___

#### On ground

```php
public function isOnGround(): bool
```

##### Description

Returns true if the aircraft is on ground.

___

#### Ground speed

```php
public function getGroundSpeed(): ?float
```

##### Description

Returns the ground speed of the aircraft, in meters per second.

##### Returned value

The ground speed, or null if no data is available.

___

#### Vertical speed

```php
public function getVerticalSpeed(): ?float
```

##### Description

Returns the vertical speed of the aircraft, in meters per second.

##### Returned value

The vertical speed, or null if no data is available.

------

#### Heading

```php
public function getHeading(): ?float
```

##### Description

Returns the heading of the aircraft, in decimal degrees.

##### Returned value

The heading, or null if no data is available.



### Other data

------

#### Last contact

```php
public function getLastContact(): int
```

##### Description

Returns the timestamp of the last message received from the aircraft.

___

#### Origin of position report

```php
public function getPositionSource(): int
```

##### Description

Returns the origin of the aircraft position report.

##### Returned value

The origin, represented by one of the following values:

| Value | Origin  | Description                                                  |
| ----- | ------- | ------------------------------------------------------------ |
| 0     | ADS-B   | The position was retrieved from the ADS-B signal sent by the aircraft. |
| 1     | ASTERIX | -                                                            |
| 2     | MLAT    | -                                                            |
| 3     | FLARM   | -                                                            |

------

#### Origin of state report

```php
public function getSensors(): array
```

##### Description

Returns the IDs of sensors which contributed to this state report.

##### Returned value

An array of integers.

___

#### Time of last position report

```php
public function getTimePosition(): ?int
```

##### Description

Returns the timestamp of the last position report.

##### Returned value

The timestamp, or null if no data was received within the 15 last seconds.



## OpenSkyApi\State\StateCollection

Represents a collection of state vectors. Implements the `\Countable` and `\Iterator` interfaces.



### State vectors

___

#### State vectors

```php
public function getStates(): array;
```

##### Description

Returns the list of state vectors.

##### Returned value

An array of `State` objects.



### Time

___

#### Time of creation

```php
public function getTimestamp(): int
```

##### Description

Returns the timestamp corresponding to the time of creation of the collection.



## OpenSkyApi\Waypoint\Waypoint

Represents a single waypoint, i.e. the position of an aircraft at a certain time during a flight.



### Position, direction and velocity

___

#### Latitude

```php
public function getLatitude(): ?float
```

##### Description

Returns the latitude of the aircraft in the WGS 84 coordinates system, in decimal degrees.

##### Returned value

The latitude, or null if no data is available.

___

#### Longitude

```php
public function getLongitude(): ?float
```

##### Description

Returns the longitude of the aircraft in the WGS 84 coordinates system, in decimal degrees.

##### Returned value

The longitude, or null if no data is available.

___

#### Barometric altitude

```php
public function getBarometricAltitude(): ?float
```

##### Description

Returns the barometric altitude of the aircraft, in meters.

##### Returned value

The altitude, or null if no data is available.

___

#### Heading

```php
public function getHeading(): ?float
```

##### Description

Returns the heading of the aircraft, in decimal degrees.

##### Returned value

The heading, or null if no data is available.

___

#### On ground

```php
public function isOnGround(): bool
```

##### Description

Returns true if the aircraft is on ground.



### Time

___

#### Timestamp

```php
public function getTime(): int
```

##### Description

Returns the timestamp corresponding to the the waypoint.



## OpenSkyApi\Waypoint\WaypointCollection

Represents a collection of waypoints. Implements the `\Countable` and `\Iterator` interfaces.



### Waypoints

------

#### Waypoints

```php
public function getWaypoints(): array
```

##### Description

Returns the list of waypoints.

##### Returned value

An array of `Waypoint` objects.



### Aircraft

___

#### Callsign

```php
public function getCallsign(): ?string
```

##### Description

Returns the callsign of the aircraft.

##### Returned value

The callsign, or null if no data is available.

___

#### Transponder address

```php
public function getICAO24(): string
```

##### Description

Returns the unique ICAO 24-bit address of the aircraft transponder, in hexadecimal string representation.



### Time

___

#### Start time

```php
public function getStartTime(): int
```

##### Description

Returns the timestamp corresponding to the first waypoint.

___

#### End time

```php
public function getEndTime(): int
```

##### Description

Returns the timestamp corresponding to the last waypoint.


