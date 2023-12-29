<?php

namespace App\Domain\Repository;

use App\Domain\Model\AtivoInterface;
use DateTime;

interface LancamentoRepositoryListOptionsInterface
{
    public function setStartDate(DateTime $date): self;

    public function setEndDate(DateTime $date): self;

    /**
     * @param AtivoInterface[]|AtivoInterface $simbolo
     * @return self
     */
    public function setSimbolo(array|AtivoInterface $simbolo): self;

    /**
     * @param array{field: string, order: 'asc'|'desc'} $order
     * @return self
     */
    public function setOrderedBy(array $order): self;
}
