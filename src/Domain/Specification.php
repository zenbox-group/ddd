<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Domain;

abstract class Specification
{
    /**
     * @param mixed $value
     * @return bool
     */
    abstract public function isSatisfiedBy($value): bool;

    /**
     * @param mixed $value
     * @return bool
     */
    public function __invoke($value): bool
    {
        return $this->isSatisfiedBy($value);
    }
}