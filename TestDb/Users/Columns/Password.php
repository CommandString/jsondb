<?php
use CommandString\JsonDb\Structure\Column;
use CommandString\JsonDb\Structure\DataTypes;

class Password extends Column {
    protected static DataTypes $type = DataTypes::STRING;
    protected static string $name = "password";
}