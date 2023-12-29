<?php

namespace App\Application\UseCase\Ativo;

use App\Application\UseCase\Dto\ResponseDto;

class AtualizarAtivo extends AtivoUseCase
{

    public function execute(): ResponseDto
    {
        $ativo = $this->repository->openById($this->requestBody['id']);
        $ativo->setSimbolo($this->requestBody['simbolo']);
        $this->repository->save($ativo);
        return ResponseDto::create()
            ->withMessage('OK')
            ->withBody($ativo->jsonSerialize());
    }
}
