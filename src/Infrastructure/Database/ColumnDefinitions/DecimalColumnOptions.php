<?php

namespace App\Infrastructure\Database\ColumnDefinitions;

class DecimalColumnOptions extends DefaultColumnOptions
{
    public function precision(int $value): self
    {
        $this->options['precision'] = $value;
        return $this;
    }

    public function scale(int $value): self
    {
        $this->options['scale'] = $value;
        return $this;
    }

    public function unsigned(): self
    {
        $this->options['signed'] = false;
        return $this;
    }
}
