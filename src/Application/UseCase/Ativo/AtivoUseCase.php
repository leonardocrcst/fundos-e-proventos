<?php

namespace App\Application\UseCase\Ativo;

use App\Application\UseCase\UseCase;
use App\Domain\Repository\AtivoRepositoryInterface;

abstract class AtivoUseCase extends UseCase
{
    public function __construct(
        protected AtivoRepositoryInterface $repository
    ) {
    }

}
