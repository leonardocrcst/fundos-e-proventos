<?php

namespace App\Application\UseCase\Lancamento;

use App\Application\UseCase\Dto\ResponseDto;

class ListarTodosOsLancamentos extends LancamentoUseCase
{
    public function execute(): ResponseDto
    {
        return ResponseDto::create()
            ->withMessage('Em desenvolvimento');
    }
}
