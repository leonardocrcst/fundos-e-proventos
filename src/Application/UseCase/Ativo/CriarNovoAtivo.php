<?php

namespace App\Application\UseCase\Ativo;

use App\Application\UseCase\Dto\ResponseDto;
use App\Domain\Model\Ativo;
use Exception;

class CriarNovoAtivo extends AtivoUseCase
{
    /**
     * @throws Exception
     */
    public function execute(): ResponseDto
    {
        $ativo = Ativo::builder()->setSimbolo($this->requestBody['simbolo']);
        $this->repository->save($ativo);
        return ResponseDto::create()
            ->withMessage('OK')
            ->withStatus(201)
            ->withBody($ativo->jsonSerialize());
    }
}
