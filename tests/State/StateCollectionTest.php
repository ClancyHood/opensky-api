<?php

namespace OpenSkyApi\Tests\State;

use OpenSkyApi\State\StateCollection;
use OpenSkyApi\State\StateInterface;
use PHPUnit\Framework\TestCase;

final class StateCollectionTest extends TestCase
{
    public function testConstructor(): void
    {
        $this->assertInstanceOf(StateCollection::class, new StateCollection());
    }

    public function testGetStates(): void
    {
        $stateCollection = new StateCollection(['states' => [[], []]]);

        $this->assertIsArray($stateCollection->getStates());
        $this->assertCount(2, $stateCollection->getStates());
        $this->assertInstanceOf(StateInterface::class, $stateCollection->getStates()[0]);

        $stateCollection = new StateCollection();

        $this->assertIsArray($stateCollection->getStates());
        $this->assertEmpty($stateCollection->getStates());
    }

    public function testGetTimestamp(): void
    {
        $stateCollection = new StateCollection(['time' => 1554818330]);

        $this->assertIsInt($stateCollection->getTimestamp());
        $this->assertEquals(1554818330, $stateCollection->getTimestamp());

        $stateCollection = new StateCollection(['time' => '1554818330']);

        $this->assertIsInt($stateCollection->getTimestamp());
        $this->assertEquals(1554818330, $stateCollection->getTimestamp());
    }

    public function testCountableInterface(): void
    {
        $stateCollection = new StateCollection(['states' => [[], []]]);

        $this->assertIsInt($stateCollection->count());
        $this->assertEquals(2, $stateCollection->count());
    }

    public function testIteratorInterface(): void
    {
        $stateCollection = new StateCollection(['states' => [[], []]]);

        $this->assertInstanceOf(StateInterface::class, $stateCollection->current());
        $this->assertIsInt($stateCollection->key());
        $this->assertEquals(0, $stateCollection->key());

        $stateCollection->next();

        $this->assertTrue($stateCollection->valid());
        $this->assertEquals(1, $stateCollection->key());

        $stateCollection->next();
        $stateCollection->next();

        $this->assertIsBool($stateCollection->valid());
        $this->assertFalse($stateCollection->valid());

        $stateCollection->rewind();

        $this->assertTrue($stateCollection->valid());
        $this->assertEquals(0, $stateCollection->key());
    }
}
