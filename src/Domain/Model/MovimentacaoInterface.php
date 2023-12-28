<?php

namespace App\Domain\Model;

interface MovimentacaoInterface
{
    public function add(AtivoInterface $ativo, \DateTime $dataCompra, float $valorUnitario, int $quantidade): void;

    public function rem(AtivoInterface $ativo, \DateTime $dataVenda, float $valorUnitario, int $quantidade): void;
}
