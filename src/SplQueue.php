<?php

/**
 * @see       https://github.com/laminas/laminas-stdlib for the canonical source repository
 * @copyright https://github.com/laminas/laminas-stdlib/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-stdlib/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\Stdlib;

use Serializable;

/**
 * Serializable version of SplQueue
 *
 * @phpstan-template TValue
 */
class SplQueue extends \SplQueue implements Serializable
{
    /**
     * Return an array representing the queue
     *
     * @return array
     * @phpstan-return array<int, TValue>
     */
    public function toArray()
    {
        $array = [];
        foreach ($this as $item) {
            $array[] = $item;
        }
        return $array;
    }

    /**
     * Serialize
     *
     * @return string
     */
    public function serialize()
    {
        return serialize($this->toArray());
    }

    /**
     * Unserialize
     *
     * @param  string $data
     * @return void
     */
    public function unserialize($data)
    {
        foreach (unserialize($data) as $item) {
            $this->push($item);
        }
    }
}
