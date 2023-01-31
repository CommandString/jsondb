<?php

namespace CommandString\JsonDb\Structure;

enum DataTypes: string
{
    case STRING = "string";
    case INT = "int";
    case FLOAT = "float";
    case BOOL = "bool";
    case NULL = "null";
    case ENUM = "";
}