<?php

namespace App\Application\UseCase\Exception;

class InvalidRequestBodyException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Invalid request body', 400);
    }
}
