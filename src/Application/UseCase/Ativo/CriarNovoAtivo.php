<?php

namespace App\Application\UseCase\Ativo;

use App\Application\UseCase\Dto\ResponseDto;
use App\Application\UseCase\UseCase;

class CriarNovoAtivo extends UseCase
{

    public function execute(): ResponseDto
    {
        return ResponseDto::create()
            ->withMessage('OK')
            ->withBody($this->requestBody);
    }
}
