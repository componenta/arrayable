<?php

declare(strict_types=1);

namespace Componenta\Arrayable;

/**
 * Interface Arrayable
 *
 * Contract for objects that can be converted to an array.
 */
interface Arrayable
{
    /**
     * Converts the object to an array.
     *
     * @return array The array representation.
     */
    public function toArray(): array;
}
