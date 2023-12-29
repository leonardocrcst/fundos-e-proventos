<?php

namespace App\Domain\Model;

use DateTime;
use Exception;

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

    /**
     * @throws Exception
     */
    public static function factory(array $data): EntityInterface
    {
        $lancamento = new Lancamento();
        return $lancamento->setId($data['id'])
            ->setCreatedAt($data['created_at'])
            ->setUpdatedAt($data['updated_at'])
            ->setDeletedAt($data['deleted_at'])
            ->setAtivo($data['ativo'])
            ->setQuantidade($data['quantidade'])
            ->setDataEvento($lancamento->fromPersistenceValue($data['data_evento']))
            ->setValorUnitario($data['valor_unitario']);
    }
}
