<?php

use CommandString\JsonDb\Structure\Column;
use CommandString\JsonDb\Structure\DataTypes;

class Color extends Column {
    protected static DataTypes $type = DataTypes::ENUM;
    protected static array $enumValues = ["green", "blue", "orange", "purple", "red", "pink", "brown", "teal", "white", "black"];
    protected static string $name = "color";
    protected static string|int|float|null $default = "red";
}