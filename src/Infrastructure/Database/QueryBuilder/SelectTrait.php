<?php

namespace App\Infrastructure\Database\QueryBuilder;

trait SelectTrait
{
    public function getSelectQueryByFieldValue(string $field, mixed $value, ?array $columns = null): string
    {
        $columnsList = !is_null($columns)
            ? implode('`, `', $columns)
            : '*';
        return sprintf(
            "%s %s FROM %s WHERE $field = '%s'",
            'SELECT',
            '*' == $columnsList ? $columnsList : "`$columnsList`",
            $this->getTable(),
            addslashes($value)
        );
    }

    public function getSelectQuery(?array $columns): string
    {
        $columnsList = !is_null($columns)
            ? implode('`, `', $columns)
            : '*';
        return sprintf(
            "%s %s FROM %s WHERE deleted_at is NULL",
            'SELECT',
            '*' == $columnsList ? $columnsList : "`$columnsList`",
            $this->getTable()
        );
    }
}
