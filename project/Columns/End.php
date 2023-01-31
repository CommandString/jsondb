<?php

namespace Project\Columns;

use CommandString\JsonDb\Structure\Column;
use CommandString\JsonDb\Structure\DataTypes;

class End extends Column {
    protected static string                 $name = "end";
    protected static DataTypes              $type = DataTypes::INT;
    protected static string|int|float|null  $default = 0;
}