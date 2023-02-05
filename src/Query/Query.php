<?php

namespace CommandString\JsonDb\Query;

use CommandString\JsonDb\Structure\Row;
use CommandString\JsonDb\Structure\Table;

class Query {
    use Where\Methods;
    
    public function __construct(private Table $table) {}

    public function execute(): array
    {
        $rows = [];
        foreach ($this->table->getRows() as $row) {
            if ($this->doesRowMatchQuery($row)) {
                $rows[$row->getId()] = $row; 
            }
        }
        return $rows;
    }

    private function doesRowMatchQuery(Row $row): bool
    {
        foreach ($this->wheres as $where) {
            $rowValue = $row->{$where->columnName};
            $whereValue = $where->value;
            $matches = false;

            switch ($where->operator) {
                case Operators::EQUAL_TO:
                    $matches = ($rowValue === $whereValue);
                    break;
                case Operators::GREATER_THAN:
                    $matches = ($rowValue > $whereValue);
                    break;
                case Operators::LESS_THAN:
                    $matches = ($rowValue < $whereValue);
                    break;
                case Operators::IN:
                    $matches = in_array($rowValue, $whereValue);
                    break;
                case Operators::NOT_EQUAL_TO:
                    $matches = ($rowValue !== $whereValue);
            }

            if ($where->type === Where\Types::OR && $matches) {
                break;
            } else if (!$matches) {
                return false;
            }
        }

        return true;
    }
}