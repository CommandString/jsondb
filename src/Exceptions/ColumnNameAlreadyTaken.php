<?php

namespace CommandString\JsonDb\Exceptions;

use CommandString\JsonDb\Structure\Table;
use Exception;

class ColumnNameAlreadyTaken extends Exception {
    public function __construct(public readonly string $column, public readonly ?Table $table = null) {
        parent::__construct((!is_null($table)) ? $column::getName() . " is already being used in " . $table::class : $column::getName() . " is already being used.");
    }
}