<?php

namespace App\Infrastructure\Database\ColumnDefinitions;

enum ColumnType: string
{
    case BINARY = 'binary';
    case BOOLEAN = 'boolean';
    case CHAR = 'char';
    case DATE = 'date';
    case DATETIME = 'datetime';
    case DECIMAL = 'decimal';
    case FLOAT = 'float';
    case DOUBLE = 'double';
    case SMALL_INTEGER = 'smallinteger';
    case INTEGER = 'integer';
    case BIG_INTEGER = 'biginteger';
    case STRING = 'string';
    case TEXT = 'text';
    case TIME = 'time';
    case TIMESTAMP = 'timestamp';
    case UUID = 'uuid';
}
