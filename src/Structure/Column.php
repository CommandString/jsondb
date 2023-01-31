<?php

namespace CommandString\JsonDb\Structure;

use LogicException;

abstract class Column {
    protected static DataTypes              $type;
    protected static string                 $name;
    protected static array                  $enumValues = [];
    protected static string|int|float|null  $default;
    protected static bool $nullable =       false;

    public static function verifyData(DataTypes $type, mixed $value): bool
    {
        if (is_null($value) && static::$nullable) {
            return true;
        }
        
        if ($type !== DataTypes::ENUM) {
            $functionName = "is_$type->value";
            return $functionName($value);
        }

        return in_array($value, static::$enumValues);
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
        $name = strtolower(static::$name);

        if ($name === "id") {
            throw new LogicException("Column name ID is already taken");
        }

        return $name;
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