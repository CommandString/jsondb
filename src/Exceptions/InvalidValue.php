<?php

namespace CommandString\JsonDb\Exceptions;

use CommandString\JsonDb\Structure\DataTypes;
use Exception;

class InvalidValue extends Exception {
    public function __construct(public readonly string $column, public readonly string|int|float|null $value, public readonly DataTypes $type) {
        if ($type === DataTypes::ENUM) {
            parent::__construct("The value for $column must be one of the following: " . implode(",", $column::getEnumValues()));
            return;
        }

        parent::__construct("The datatype for $column is " . $column::getType()->value . ". ".ucfirst(gettype($value))." provided");
    }
}