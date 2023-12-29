<?php

namespace App\Application\UseCase\Ativo;

use App\Application\UseCase\Dto\ResponseDto;
use App\Domain\Repository\AtivoRepositoryInterface;

class ListarTodosOsAtivos extends AtivoUseCase
{
    public function execute(): ResponseDto
    {
        $ativos = $this->repository->list();
        return ResponseDto::create()
            ->withMessage('OK')
            ->withBody($this->serializeEntities($ativos));
    }
}
