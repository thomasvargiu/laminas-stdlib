<?php

/**
 * @see       https://github.com/laminas/laminas-stdlib for the canonical source repository
 * @copyright https://github.com/laminas/laminas-stdlib/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-stdlib/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\Stdlib;

use ArrayAccess;
use Countable;
use Serializable;
use Traversable;

/**
 * Basically, an ArrayObject. You could simply define something like:
 *     class QueryParams extends ArrayObject implements Parameters {}
 * and have 90% of the functionality
 *
 * @template-extends ArrayAccess<string, mixed>
 * @template-extends Traversable<string, mixed>
 */
interface ParametersInterface extends ArrayAccess, Countable, Serializable, Traversable
{
    /**
     * Constructor
     *
     * @param array<string, mixed> $values
     */
    public function __construct(array $values = null);

    /**
     * From array
     *
     * Allow deserialization from standard array
     *
     * @param array<string, mixed> $values
     * @return void
     */
    public function fromArray(array $values);

    /**
     * From string
     *
     * Allow deserialization from raw body; e.g., for PUT requests
     *
     * @param string $string
     * @return void
     */
    public function fromString($string);

    /**
     * To array
     *
     * Allow serialization back to standard array
     *
     * @return array<string, mixed>
     */
    public function toArray();

    /**
     * To string
     *
     * Allow serialization to query format; e.g., for PUT or POST requests
     *
     * @return string
     */
    public function toString();

    /**
     * Get
     *
     * @param string $name
     * @param mixed|null $default
     * @return mixed
     */
    public function get($name, $default = null);

    /**
     * Set
     *
     * @param string $name
     * @param mixed $value
     * @return ParametersInterface
     */
    public function set($name, $value);
}
