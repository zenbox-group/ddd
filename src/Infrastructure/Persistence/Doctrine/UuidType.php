<?php

declare(strict_types=1);

namespace ZenBox\Ddd\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\GuidType;
use ZenBox\Ddd\Domain\Identifier;
use ZenBox\Ddd\Domain\UuidIdentifier;

final class UuidType extends GuidType
{
    const NAME = 'uuid';

    /**
     * Converts a value from its PHP representation to its database representation
     * of this type.
     *
     * @param mixed $value The value to convert.
     * @param AbstractPlatform $platform The currently used database platform.
     *
     * @return mixed The database representation of the value.
     * @throws ConversionException
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof Identifier) {
            return $value->toString();
        } elseif (is_string($value)) {
            return $value;
        } elseif (is_null($value)) {
            return $value;
        }

        throw ConversionException::conversionFailedInvalidType($value, $this->getName(), [Identifier::class]);
    }

    /**
     * Converts a value from its database representation to its PHP representation
     * of this type.
     *
     * @param mixed $value The value to convert.
     * @param AbstractPlatform $platform The currently used database platform.
     *
     * @return mixed The PHP representation of the value.
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null || $value instanceof Identifier) {
            return $value;
        }

        return UuidIdentifier::fromString($value);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }
}