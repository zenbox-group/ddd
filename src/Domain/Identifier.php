<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Domain;

use ZenBox\Ddd\Domain\Exception\IdentifierGenerateException;

interface Identifier
{
    /**
     * @return Identifier
     * @throws IdentifierGenerateException
     */
    public static function generate(): Identifier;

    /**
     * @param $string
     * @return Identifier
     */
    public static function fromString(string $string): Identifier;

    /**
     * Determine equality with another Identifier
     *
     * @param Identifier $other
     * @return bool
     */
    public function equals(Identifier $other): bool;

    /**
     * @return string
     */
    public function toString(): string;
}