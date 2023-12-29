<?php

namespace App\Domain\Repository;

use App\Domain\Model\AtivoInterface;

interface AtivoRepositoryInterface extends EntityRepositoryInterface
{
    public function openBySimbolo(string $simbolo): AtivoInterface;

    /**
     * @return AtivoInterface[]
     */
    public function list(): array;

    /**
     * @param AtivoInterface $ativo
     * @return int Ativo identity
     */
    public function save(AtivoInterface $ativo): int;
}
