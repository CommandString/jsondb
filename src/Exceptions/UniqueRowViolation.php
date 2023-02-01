<?php

namespace CommandString\JsonDb\Exceptions;
use Exception;
use Throwable;

class UniqueRowViolation extends Exception {
    public function __construct(public readonly string $column, public readonly string|int|float|null $value, ?Throwable $previous = null) {
        parent::__construct("$column is unique and $value already exists in another row", 0, $previous);
    }
}