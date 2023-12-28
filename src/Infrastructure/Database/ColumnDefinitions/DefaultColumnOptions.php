<?php

namespace App\Infrastructure\Database\ColumnDefinitions;

class DefaultColumnOptions
{
    protected array $options = [];

    public function limit(int $value): self
    {
        $this->options['limit'] = $value;
        return $this;
    }

    public function length(int $value): self
    {
        return $this->limit($value);
    }

    public function defaultValue(string $value): self
    {
        $this->options['default'] = $value;
        return $this;
    }

    public function nullable(bool $flag): self
    {
        $this->options['null'] = $flag;
        return $this;
    }

    public function after(string $columnName): self
    {
        $this->options['after'] = $columnName;
        return $this;
    }

    public function comment(string $text): self
    {
        $this->options['comment'] = $text;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return $this->options;
    }
}
