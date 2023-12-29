<?php

namespace App\Infrastructure\Database;

class DatabaseAdapterException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message, 500);
    }
}
