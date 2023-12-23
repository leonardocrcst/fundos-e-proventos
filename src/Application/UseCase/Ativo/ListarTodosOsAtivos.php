<?php

namespace App\Application\UseCase\Ativo;

use App\Application\UseCase\Dto\ResponseDto;
use App\Application\UseCase\UseCase;

class ListarTodosOsAtivos extends UseCase
{

    public function execute(): ResponseDto
    {
        return ResponseDto::create()
            ->withMessage('Em processo de desenvolvimento');
    }
}
