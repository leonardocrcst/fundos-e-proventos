<?php

namespace App\Application\UseCase\Ativo;

use App\Application\UseCase\Dto\ResponseDto;
use App\Application\UseCase\UseCase;
use App\Domain\Repository\AtivoRepositoryInterface;

class ListarTodosOsAtivos extends UseCase
{
    public function __construct(
        protected AtivoRepositoryInterface $repository
    ) {
    }

    public function execute(): ResponseDto
    {
        $ativos = $this->repository->list();
        return ResponseDto::create()
            ->withMessage('OK')
            ->withBody(array_map(fn($item) => $item->jsonSerialize(), $ativos));
    }
}
