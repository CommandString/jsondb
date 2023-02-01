<?php
use CommandString\JsonDb\Structure\Column;
use CommandString\JsonDb\Structure\DataTypes;

class Uuid extends Column {
    protected static DataTypes $type = DataTypes::STRING;
    protected static string $name = "uuid";
    protected static bool $unique = true;
}