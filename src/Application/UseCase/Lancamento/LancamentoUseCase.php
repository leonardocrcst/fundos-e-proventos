<?php

namespace App\Application\UseCase\Lancamento;

use App\Application\UseCase\UseCase;
use App\Domain\Repository\LancamentoRepositoryInterface;

abstract class LancamentoUseCase extends UseCase
{
    public function __construct(
        protected LancamentoRepositoryInterface $repository
    ) {
    }
}
