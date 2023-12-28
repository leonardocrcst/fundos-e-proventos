<?php

namespace App\Domain\Model;

use DateTime;

class Lancamento extends Entity implements LancamentoInterface
{
    protected AtivoInterface $ativo;
    protected DateTime $dataEvento;
    protected float $valorUnitario;
    protected int $quantidade;

    public static function builder(): Lancamento
    {
        return (new Lancamento())
            ->setCreatedAt(new DateTime());
    }

    public function getAtivo(): AtivoInterface
    {
        return $this->ativo;
    }

    public function setAtivo(AtivoInterface $ativo): LancamentoInterface
    {
        $this->ativo = $ativo;
        return $this;
    }

    public function getDataEvento(): DateTime
    {
        return $this->dataEvento;
    }

    public function setDataEvento(DateTime $dataEvento): LancamentoInterface
    {
        $this->dataEvento = $dataEvento;
        return $this;
    }

    public function getValorUnitario(): float
    {
        return $this->valorUnitario;
    }

    public function setValorUnitario(float $valorUnitario): LancamentoInterface
    {
        $this->valorUnitario = $valorUnitario;
        return $this;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): LancamentoInterface
    {
        $this->quantidade = $quantidade;
        return $this;
    }
}
