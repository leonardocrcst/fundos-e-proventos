<?php

namespace App\Infrastructure\Database\ColumnDefinitions;

class TimestampColumnOptions extends DefaultColumnOptions
{
    public function currentTimestamp(): self
    {
        $this->defaultValue('CURRENT_TIMESTAMP');
        return $this;
    }
}
