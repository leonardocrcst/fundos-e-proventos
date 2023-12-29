<?php

namespace App\Infrastructure\Repository\Exception;

class RegisterNotFoundException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message, 204);
    }
}
