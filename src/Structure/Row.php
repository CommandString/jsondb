<?php

namespace CommandString\JsonDb\Structure;

use InvalidArgumentException;
use JsonSerializable;
use LogicException;

class Row implements JsonSerializable {
    private array $values = [];

    public function __construct(private Table $table, private int $id = -1, array $values = []) {
        foreach ($values as $name => $value) {
            $this->__set($name, $value);
        }
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function __set(string $name, mixed $value): void
    {
        $column = $this->table::getColumn($name);

        if (!$column::verifyData($column::getType(), $value)) {
            throw new InvalidArgumentException("This not a valid value for this column");
        }

        $this->values[$name] = $value;
    }
    
    public function setColumn(string $column, string|int|float $data): self
    {
        $this->__set($column, $data);
        return $this;
    }

    public function jsonSerialize(): array
    {
        $columnsSet = array_keys($this->values);
        foreach ($this->table::getColumns() as $column) {
            if (!in_array($column::getName(), $columnsSet)) {
                $default = $column::getDefault();

                if (is_null($default) && !$column::isNullable()) {
                    throw new LogicException($column::getName() . ' does not have a default value and must be set');
                }

                $this->__set($column::getName(), $column::getDefault());
            }
        }

        return $this->values;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function __get($name): mixed
    {
        return $this->values[$name] ?? null;
    }

    public function store(): void
    {
        $this->table->storeRow($this);
    }
}