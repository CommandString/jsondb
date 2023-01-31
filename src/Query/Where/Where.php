<?php

namespace CommandString\JsonDb\Query\Where;

use CommandString\JsonDb\Query\Operators;

class Where {
    public function __construct(
        public readonly string $columnName,
        public readonly Operators $operator,
        public readonly array|string|int|float|null $value,
        public readonly Types $type
    ) {}
}