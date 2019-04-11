<?php

namespace OpenSkyApi\Tests\State;

use OpenSkyApi\State\State;
use PHPUnit\Framework\TestCase;

final class StateTest extends TestCase
{
    public function testConstructor(): void
    {
        $this->assertInstanceOf(State::class, new State([]));
    }

    public function testGetBarometricAltitude(): void
    {
        $state = new State([7 => 327.66]);

        $this->assertIsFloat($state->getBarometricAltitude());
        $this->assertEquals(327.66, $state->getBarometricAltitude());

        $state = new State([7 => '327.66']);

        $this->assertIsFloat($state->getBarometricAltitude());
        $this->assertEquals(327.66, $state->getBarometricAltitude());

        $state = new State([7 => null]);

        $this->assertNull($state->getBarometricAltitude());
    }

    public function testGetCallsign(): void
    {
        $state = new State([1 => 'GAF891']);

        $this->assertIsString($state->getCallsign());
        $this->assertEquals('GAF891', $state->getCallsign());

        $state = new State([1 => null]);

        $this->assertNull($state->getCallsign());
    }

    public function testGetGeometricAltitude(): void
    {
        $state = new State([13 => 297.18]);

        $this->assertIsFloat($state->getGeometricAltitude());
        $this->assertEquals(297.18, $state->getGeometricAltitude());

        $state = new State([13 => '297.18']);

        $this->assertIsFloat($state->getGeometricAltitude());
        $this->assertEquals(297.18, $state->getGeometricAltitude());

        $state = new State([13 => null]);

        $this->assertNull($state->getGeometricAltitude());
    }

    public function testGetGroundSpeed(): void
    {
        $state = new State([9 => 76.57]);

        $this->assertIsFloat($state->getGroundSpeed());
        $this->assertEquals(76.57, $state->getGroundSpeed());

        $state = new State([9 => '76.57']);

        $this->assertIsFloat($state->getGroundSpeed());
        $this->assertEquals(76.57, $state->getGroundSpeed());

        $state = new State([9 => null]);

        $this->assertNull($state->getGroundSpeed());
    }

    public function testGetHeading(): void
    {
        $state = new State([10 => 321.82]);

        $this->assertIsFloat($state->getHeading());
        $this->assertEquals(321.82, $state->getHeading());

        $state = new State([10 => '321.82']);

        $this->assertIsFloat($state->getHeading());
        $this->assertEquals(321.82, $state->getHeading());

        $state = new State([10 => null]);

        $this->assertNull($state->getHeading());
    }

    public function testGetICAO24(): void
    {
        $state = new State([0 => '3eb1a6']);

        $this->assertIsString($state->getICAO24());
        $this->assertEquals('3eb1a6', $state->getICAO24());
    }

    public function testGetLastContact(): void
    {
        $state = new State([4 => 1554818329]);

        $this->assertIsInt($state->getLastContact());
        $this->assertEquals(1554818329, $state->getLastContact());

        $state = new State([4 => '1554818329']);

        $this->assertIsInt($state->getLastContact());
        $this->assertEquals(1554818329, $state->getLastContact());
    }

    public function testGetLatitude(): void
    {
        $state = new State([6 => 43.5984]);

        $this->assertIsFloat($state->getLatitude());
        $this->assertEquals(43.5984, $state->getLatitude());

        $state = new State([6 => '43.5984']);

        $this->assertIsFloat($state->getLatitude());
        $this->assertEquals(43.5984, $state->getLatitude());

        $state = new State([6 => null]);

        $this->assertNull($state->getLatitude());
    }

    public function testGetLongitude(): void
    {
        $state = new State([5 => 1.3979]);

        $this->assertIsFloat($state->getLongitude());
        $this->assertEquals(1.3979, $state->getLongitude());

        $state = new State([5 => '1.3979']);

        $this->assertIsFloat($state->getLongitude());
        $this->assertEquals(1.3979, $state->getLongitude());

        $state = new State([5 => null]);

        $this->assertNull($state->getLongitude());
    }

    public function testIsOnGround(): void
    {
        $state = new State([8 => false]);

        $this->assertIsBool($state->isOnGround());
        $this->assertFalse($state->isOnGround());
    }

    public function testGetOriginCountry(): void
    {
        $state = new State([2 => 'Germany']);

        $this->assertIsString($state->getOriginCountry());
        $this->assertEquals('Germany', $state->getOriginCountry());
    }

    public function testGetPositionSource(): void
    {
        $state = new State([16 => 0]);

        $this->assertIsInt($state->getPositionSource());
        $this->assertEquals(0, $state->getPositionSource());

        $state = new State([16 => '0']);

        $this->assertIsInt($state->getPositionSource());
        $this->assertEquals(0, $state->getPositionSource());
    }

    public function testGetSensors(): void
    {
        $state = new State([12 => [1648, 3234, 4859, 7734]]);

        $this->assertIsArray($state->getSensors());
        $this->assertCount(4, $state->getSensors());
        $this->assertEquals([1648, 3234, 4859, 7734], $state->getSensors());

        $state = new State([12 => ['1648', '3234', '4859', '7734']]);

        $this->assertIsArray($state->getSensors());
        $this->assertCount(4, $state->getSensors());
        $this->assertEquals([1648, 3234, 4859, 7734], $state->getSensors());

        $state = new State([12 => null]);

        $this->assertIsArray($state->getSensors());
        $this->assertEmpty($state->getSensors());
    }

    public function testIsSpi(): void
    {
        $state = new State([15 => false]);

        $this->assertIsBool($state->isSpi());
        $this->assertEquals(false, $state->isSpi());
    }

    public function testGetSquawk(): void
    {
        $state = new State([14 => '3527']);

        $this->assertIsString($state->getSquawk());
        $this->assertEquals('3527', $state->getSquawk());

        $state = new State([14 => 3527]);

        $this->assertIsString($state->getSquawk());
        $this->assertEquals('3527', $state->getSquawk());

        $state = new State([14 => null]);

        $this->assertNull($state->getSquawk());
    }

    public function testGetTimePosition(): void
    {
        $state = new State([3 => 1554818328]);

        $this->assertIsInt($state->getTimePosition());
        $this->assertEquals(1554818328, $state->getTimePosition());

        $state = new State([3 => '1554818328']);

        $this->assertIsInt($state->getTimePosition());
        $this->assertEquals(1554818328, $state->getTimePosition());

        $state = new State([3 => null]);

        $this->assertNull($state->getTimePosition());
    }

    public function testGetVerticalSpeed(): void
    {
        $state = new State([11 => -3.25]);

        $this->assertIsFloat($state->getVerticalSpeed());
        $this->assertEquals(-3.25, $state->getVerticalSpeed());

        $state = new State([11 => '-3.25']);

        $this->assertIsFloat($state->getVerticalSpeed());
        $this->assertEquals(-3.25, $state->getVerticalSpeed());

        $state = new State([11 => null]);

        $this->assertNull($state->getVerticalSpeed());
    }
}
