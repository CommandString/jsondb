<?php

namespace CommandString\JsonDb\Structure;

use CommandString\JsonDb\Query\Query;
use JsonSerializable;
use LogicException;

abstract class Table implements JsonSerializable {
    protected static string $name;
    protected static string $fileLocation;
    protected static array $columns = [];
    protected static int $encoderFlags = 0;
    protected array $rows = [];

    public function __construct() {
        if (!file_exists(static::$fileLocation)) {
            return;
        }

        foreach ($this->getJson() as $id => $values) {
            $this->rows[$id] = new Row($this, $id, $values);
        }
    }

    private function getJson(): array
    {
        return json_decode(file_get_contents(static::$fileLocation), true);
    }
    public function newQuery(): Query
    {
        return new Query($this);
    }
    
    public function newRow(): Row
    {
        return new Row($this);
    }

    public static function getColumn(string $columnName): ?string
    {
        foreach (static::$columns as $column) {
            if (!is_subclass_of($column, Column::class)) {
                throw new LogicException("$column is not a valid column.");
            }

            if ($column::getName() === $columnName) {
                return $column;
            }
        }

        return null;
    }

    public static function getColumns(): array
    {
        return static::$columns;
    }

    public function jsonSerialize(): array
    {
        $json = [];

        foreach ($this->rows as $row) {
            $json[$row->getId()] = $row->jsonSerialize();
        }

        return $json;
    }

    private function exportRows(): void
    {
        file_put_contents(static::$fileLocation, json_encode($this, static::$encoderFlags));
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    public function storeRow(Row &$row): void
    {
        if ($row->getId() < 0) {
            $row = new Row($this, count($this->rows), $row->getValues());
        }

        $this->rows[$row->getId()] = $row;

        $this->exportRows();
    }
    
}