<?php
/**
 * @author  Jérémie BROUTIER <jeremie.broutier@gmail.com>
 * @license MIT
 */

namespace OpenSkyApi\State;

/**
 * Interface StateCollectionInterface
 *
 * @package OpenSkyApi\State
 */
interface StateCollectionInterface
{
    /**
     * Returns the list of state vectors.
     *
     * @return StateInterface[]
     */
    public function getStates(): array;

    /**
     * @return int
     */
    public function getTimestamp(): int;
}
