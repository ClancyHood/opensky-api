<?php
/**
 * @author  Jérémie BROUTIER <jeremie.broutier@gmail.com>
 * @license MIT
 */

namespace OpenSkyApi\State;

/**
 * Class StateCollection
 * @package OpenSkyApi\State
 */
class StateCollection implements StateCollectionInterface, \Countable, \Iterator
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var StateInterface[]
     */
    protected $states;

    /**
     * StateCollection constructor.
     *
     * @param array $data Data received from the API.
     */
    public function __construct(array $data = [])
    {
        $this->data     = $data;
        $this->position = 0;
        $this->states   = [];

        if (array_key_exists('states', $this->data) and is_array($this->data['states'])) {
            foreach ($this->data['states'] as $state) {
                $this->states[] = new State($state);
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getStates(): array
    {
        return $this->states;
    }

    /**
     * {@inheritDoc}
     */
    public function getTimestamp(): int
    {
        return intval($this->data['time']);
    }

    public function count(): int
    {
        return count($this->states);
    }

    public function current(): StateInterface
    {
        return $this->states[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->states[$this->position]);
    }
}
