<?php

namespace App\Infrastructure\Database\ColumnDefinitions;

class EnumOrSetColumnOptions extends DefaultColumnOptions
{
    public function values(array $values): self
    {
        $this->options['values'] = $values;
        return $this;
    }
}
