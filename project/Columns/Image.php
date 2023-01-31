<?php

namespace Project\Columns;

use CommandString\JsonDb\Structure\Column;
use CommandString\JsonDb\Structure\DataTypes;

class Image extends Column {
    protected static string $name = "image";
    protected static DataTypes $type = DataTypes::STRING;
    protected static bool $nullable = true;
}