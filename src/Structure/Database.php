<?php

namespace CommandString\JsonDb\Structure;

use LogicException;

abstract class Database {
    protected static array $tableClasses = [];
    protected array $tables = [];

    public function __construct(int $encoderFlags = 0) {
        foreach ($this->tableClasses as $class) {
            if (!is_subclass_of(Table::class, $class)) {
                throw new LogicException("Your table class must extend " . Table::class);
            }

            $table = new $class($encoderFlags);

            if (isset($tables[$table::getName()])) {
                throw new LogicException("This table name is already being used inside this database");
            }
            
            $this->tables[$table::getName()] = $table;
        }
    }

    public function getTable(string $name): ?Table
    {
        return $this->tables[$name] ?? null;
    }
}