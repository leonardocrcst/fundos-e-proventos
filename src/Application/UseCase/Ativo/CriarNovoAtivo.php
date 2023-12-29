<?php

namespace App\Application\UseCase\Ativo;

use App\Application\UseCase\Dto\ResponseDto;
use App\Application\UseCase\UseCase;
use App\Domain\Repository\AtivoRepositoryInterface;

class CriarNovoAtivo extends UseCase
{
    public function __construct(
        protected AtivoRepositoryInterface $repository
    ) {
    }

    public function execute(): ResponseDto
    {
        return ResponseDto::create()
            ->withMessage('OK')
            ->withBody($this->requestBody);
    }
}
