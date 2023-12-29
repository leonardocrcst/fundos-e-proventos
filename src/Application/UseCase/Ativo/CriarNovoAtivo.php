<?php

namespace App\Application\UseCase\Ativo;

use App\Application\UseCase\Dto\ResponseDto;
use App\Application\UseCase\UseCase;
use App\Domain\Model\Ativo;
use App\Domain\Repository\AtivoRepositoryInterface;
use Exception;

class CriarNovoAtivo extends UseCase
{
    public function __construct(
        protected AtivoRepositoryInterface $repository
    ) {
    }

    /**
     * @throws Exception
     */
    public function execute(): ResponseDto
    {
        $ativo = Ativo::builder()->setSimbolo($this->requestBody['simbolo']);
        $this->repository->save($ativo);
        return ResponseDto::create()
            ->withMessage('OK')
            ->withBody($ativo->jsonSerialize());
    }
}
