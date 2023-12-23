<?php

namespace App\Domain\Model;

use DateTime;

class Ativo extends Entity implements AtivoInterface
{
    protected string $simbolo;

    public function getSimbolo(): string
    {
        return $this->simbolo;
    }

    public function setSimbolo(string $simbolo): Ativo
    {
        $this->simbolo = $simbolo;
        return $this;
    }

    public static function builder(): self
    {
        $novo = new Ativo();
        return $novo
            ->setCreatedAt(new DateTime());
    }
}
