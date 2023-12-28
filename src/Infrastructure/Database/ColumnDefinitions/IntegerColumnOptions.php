<?php

namespace App\Infrastructure\Database\ColumnDefinitions;

class IntegerColumnOptions extends DefaultColumnOptions
{
    public function autoIncrement(): self
    {
        $this->options['identity'] = true;
        return $this;
    }

    public function unsigned(): self
    {
        $this->options['signed'] = false;
        return $this;
    }
}
