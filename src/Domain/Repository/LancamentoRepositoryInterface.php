<?php

namespace App\Domain\Repository;

use DateTime;

interface LancamentoRepositoryInterface extends EntityRepositoryInterface
{
    public function listByDateRange(DateTime $start, DateTime $end, ?string $simbolo = null);
}
