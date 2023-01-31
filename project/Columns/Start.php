<?php

namespace Project\Columns;

use CommandString\JsonDb\Structure\Column;
use CommandString\JsonDb\Structure\DataTypes;

class Start extends Column {
    protected static string $name = "start";
    protected static DataTypes $type = DataTypes::INT;
}