<?php

namespace Project\Columns;

use CommandString\JsonDb\Structure\Column;
use CommandString\JsonDb\Structure\DataTypes;

class Name extends Column {
    protected static string $name = "name";
    protected static DataTypes $type = DataTypes::STRING;
}