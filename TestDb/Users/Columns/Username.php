<?php
use CommandString\JsonDb\Structure\Column;
use CommandString\JsonDb\Structure\DataTypes;

class Username extends Column {
    protected static DataTypes $type = DataTypes::STRING;
    protected static string $name = "username";
    protected static bool $unique = true;
}