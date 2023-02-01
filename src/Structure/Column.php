<?php

namespace CommandString\JsonDb\Structure;

use CommandString\JsonDb\Exceptions\ColumnNameAlreadyTaken;
use CommandString\JsonDb\Exceptions\InvalidValue;
use LogicException;

abstract class Column {
    protected static DataTypes              $type;
    protected static string                 $name;
    protected static array                  $enumValues = [];
    protected static string|int|float|null  $default;
    protected static bool                   $nullable = false;
    protected static bool                   $unique = false;

    /**
     * @param DataTypes $type
     * @param string|int|float|null $value
     * @throws InvalidValue
     * @return void
     */
    public static function verifyData(DataTypes $type, string|int|float|null $value): void
    {
        if (is_null($value) && static::$nullable) {
            return;
        }
        
        if ($type !== DataTypes::ENUM) {
            $functionName = "is_$type->value";
            if (!$functionName($value)) {
                throw new InvalidValue(static::class, $value, $type);
            }
        } else if (!in_array($value, static::$enumValues)) {
            throw new InvalidValue(static::class, $value, $type);
        }
    }

    public static function getEnumValues(): array
    {
        return static::$enumValues;
    }

    public static function getType(): DataTypes
    {
        return static::$type;
    }

    
    public static function getName(): string
    {
        return strtolower(static::$name);
    }

    public static function isUnique(): bool
    {
        return static::$unique;
    }

    public static function isNullable(): bool
    {
        return static::$nullable;
    }

    public static function getDefault(): string|int|float|null
    {
        return static::$default ?? null;
    }
}