<?php

namespace App\Domain\Model;

interface AtivoInterface
{
    public function getSimbolo(): string;

    public function setSimbolo(string $simbolo): Ativo;
}
