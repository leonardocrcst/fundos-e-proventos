<?php

namespace App\Domain\Model;

interface AtivoInterface extends EntityInterface
{
    public function getSimbolo(): string;

    public function setSimbolo(string $simbolo): Ativo;
}
