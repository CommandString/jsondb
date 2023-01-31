<?php

use CommandString\JsonDb\Query\Operators;
use Project\Project;

require_once "vendor/autoload.php";
require_once "project/Project.php";

$table = new Project;

// $table
//     ->newRow()
//     ->setColumn($table::NAME, "DPHP")
//     ->setColumn($table::DESCRIPTION, "Some cool description")
//     ->setColumn($table::START, time())
//     ->store()
// ;

$rows = $table->newQuery()->whereAnd($table::START, Operators::LESS_THAN, 1675134880)->execute();

foreach ($rows as $row) {
    echo "{$row->start} < 1675134880\n";
}