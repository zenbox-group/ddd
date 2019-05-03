<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Domain;

use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use ZenBox\Ddd\Domain\Exception\IdentifierGenerateException;

final class UuidIdentifier implements Identifier
{
    /**
     * @var UuidInterface
     */
    private $value;

    /**
     * UuidIdentifier constructor.
     * @param UuidInterface $value
     */
    public function __construct(UuidInterface $value)
    {
        $this->value = $value;
    }

    /**
     * @return Identifier
     * @throws IdentifierGenerateException
     */
    public static function generate(): Identifier
    {
        try {
            return new static(Uuid::uuid4());
        } catch (Exception $e) {
            throw new IdentifierGenerateException('Identifier generate exception', 0, $e);
        }
    }

    /**
     * @param $string
     * @return Identifier
     */
    public static function fromString(string $string): Identifier
    {
        return new static(Uuid::fromString($string));
    }

    /**
     * Determine equality with another Identifier
     *
     * @param Identifier $other
     * @return bool
     */
    public function equals(Identifier $other): bool
    {
        if ($other instanceof UuidIdentifier) {

            return $this->value->equals($other->getValue());
        }

        return false;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->value->toString();
    }

    /**
     * @return UuidInterface
     */
    public function getValue(): UuidInterface
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }
}