<?php

namespace App\Application\UseCase\Ativo;

use App\Application\UseCase\Dto\ResponseDto;

class RemoverAtivo extends AtivoUseCase
{
    public function execute(): ResponseDto
    {
        $simbolo = $this->requestBody['simbolo'];
        $ativo = $this->repository->openBySimbolo($simbolo);
        $this->repository->remove($ativo);
        return ResponseDto::create()
            ->withMessage('OK')
            ->withBody($ativo->jsonSerialize());
    }
}
