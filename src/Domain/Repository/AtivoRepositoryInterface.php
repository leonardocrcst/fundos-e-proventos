<?php

namespace App\Domain\Repository;

use App\Domain\Model\AtivoInterface;

interface AtivoRepositoryInterface extends EntityRepositoryInterface
{
    public function openBySimbolo(string $simbolo): AtivoInterface;

    public function openById(int $id): AtivoInterface;
}
