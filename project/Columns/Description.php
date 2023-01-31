<?php

namespace Project\Columns;

use CommandString\JsonDb\Structure\Column;
use CommandString\JsonDb\Structure\DataTypes;

class Description extends Column {
    protected static string $name = "description";
    protected static DataTypes $type = DataTypes::STRING;
}