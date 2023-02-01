<?php

namespace CommandString\JsonDb\Query\Where;

use CommandString\JsonDb\Query\Operators;

class Where {
    public readonly string $columnName;
    public function __construct(
        string $columnName,
        public readonly Operators $operator,
        public readonly array|string|int|float|null $value,
        public readonly Types $type
    ) {
        $this->columnName = strtolower($columnName);
    }
}