<?php

namespace App\Infrastructure\Database\QueryBuilder;

use App\Domain\Model\EntityInterface;

trait InsertTrait
{
    public function getInsertQuery(EntityInterface $entity): string
    {
        $entitySerialized = $entity->jsonSerialize();
        return sprintf(
            '%s INTO %s (`%s`) VALUES (%s)',
            'INSERT',
            $this->getTable(),
            implode('`, `', array_keys($entitySerialized)),
            implode(', ', array_map(
                    fn($item) => !is_null($item) ? "\"$item\"" : 'NULL',
                    array_values($entitySerialized))
            )
        );
    }
}
