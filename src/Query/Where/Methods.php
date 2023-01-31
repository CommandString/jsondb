<?php

namespace CommandString\JsonDb\Query\Where;

use CommandString\JsonDb\Query\Operators;

trait Methods {
    private array $wheres = [];

    private function where(string $columnName, Operators $operator, array|string|int|float|null $value, Types $type): self
    {
        $that = clone $this;

        $that->wheres[] = new Where($columnName, $operator, $value, $type);
        return $that;
    }

    public function whereAnd(string $columnName, Operators $operator, string|int|float|null $value): self
    {
        return $this->where($columnName, $operator, $value, Types::AND);
    }

    public function whereOr(string $columnName, Operators $operator, string|int|float|null $value): self
    {
        return $this->where($columnName, $operator, $value, Types::OR);
    }

    public function whereAndIn(string $columnName, string|int|float|null ...$values): self
    {
        return $this->where($columnName, Operators::IN, $values, Types::AND);
    }

    public function whereOrIn(string $columnName, string|int|float|null ...$values): self
    {
        return $this->where($columnName, Operators::IN, $values, Types::OR);
    }
}