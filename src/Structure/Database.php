<?php

namespace CommandString\JsonDb\Structure;

use LogicException;

abstract class Database {
    protected static array  $tableClasses = [];
    protected array         $tables = [];

    public function __construct(int $encoderFlags = 0) {
        foreach (static::$tableClasses as $class) {
            if (!is_subclass_of($class, Table::class)) {
                throw new LogicException("$class must extend " . Table::class);
            }

            $table = new $class($encoderFlags);

            if (isset($tables[$table::getName()])) {
                throw new LogicException("This table name is already being used inside this database");
            }
            
            $this->tables[$table::getName()] = $table;
        }
    }

    public function __get(string $name): mixed
    {
        return $this->getTable($name);
    }

    public function getTable(string $name): ?Table
    {
        return $this->tables[$name] ?? null;
    }
}