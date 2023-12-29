<?php

namespace App\Domain\Model;

use DateTime;
use Exception;

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

    /**
     * @throws Exception
     */
    public static function factory(array $data): self
    {
        $ativo = new Ativo();
        $ativo->setId($data['id']);
        $ativo->setSimbolo($data['simbolo']);
        $ativo->setCreatedAt($ativo->fromPersistenceValue($data['created_at']));
        $ativo->setUpdatedAt($ativo->fromPersistenceValue($data['updated_at']));
        $ativo->setDeletedAt($ativo->fromPersistenceValue($data['deleted_at']));
        return $ativo;
    }
}
