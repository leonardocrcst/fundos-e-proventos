<?php

namespace App\Domain\Model;

interface LancamentoInterface
{
    public function setAtivo(AtivoInterface $ativo): LancamentoInterface;

    public function setDataEvento(\DateTime $dataEvento): LancamentoInterface;

    public function setValorUnitario(float $valorUnitario): LancamentoInterface;

    public function setQuantidade(int $quantidade): LancamentoInterface;

    public function getAtivo(): AtivoInterface;

    public function getDataEvento(): \DateTime;

    public function getValorUnitario(): float;

    public function getQuantidade(): int;
}
