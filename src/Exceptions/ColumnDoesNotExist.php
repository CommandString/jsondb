<?php

namespace CommandString\JsonDb\Exceptions;

use CommandString\JsonDb\Structure\Table;
use Exception;

class ColumnDoesNotExist extends Exception {
    public function __construct(public readonly string $columnName, public readonly Table $table) {
        parent::__construct("$columnName does not exist for " . $table::class);
    } 
}