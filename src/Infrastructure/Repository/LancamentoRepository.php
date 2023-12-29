<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\EntityInterface;
use App\Domain\Repository\LancamentoRepositoryInterface;
use DateTime;

class LancamentoRepository extends EntityRepository implements LancamentoRepositoryInterface
{
    protected const string TABLE_NAME = 'lancamentos';

    public function remove(EntityInterface &$entity): void
    {
        // TODO: Implement remove() method.
    }

    public function openBy(string $field, mixed $value): mixed
    {
        // TODO: Implement openBy() method.
    }

    public function openById(int $id): EntityInterface
    {
        // TODO: Implement openById() method.
    }

    public function list(?array $columns = null): array
    {
        // TODO: Implement list() method.
    }

    public function save(EntityInterface &$entity): void
    {
        // TODO: Implement save() method.
    }

    public function listByDateRange(DateTime $start, DateTime $end, ?string $simbolo = null)
    {
        // TODO: Implement listByDateRange() method.
    }

    protected function getTable(): string
    {
        return self::TABLE_NAME;
    }
}
