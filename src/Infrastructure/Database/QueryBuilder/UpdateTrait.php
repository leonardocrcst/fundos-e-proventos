<?php

namespace App\Infrastructure\Database\QueryBuilder;

use App\Domain\Model\EntityInterface;

trait UpdateTrait
{
    public function getUpdateQuery(EntityInterface $entity): string
    {
        $ativoSerialized = $entity->jsonSerialize();
        return sprintf(
            "%s %s SET %s WHERE id = '%s'",
            'UPDATE',
            $this->getTable(),
            implode(', ', array_map(
                    function ($item, $key) {
                        $value = !is_null($item) ? "\"$item\"" : 'NULL';
                        return "`$key` = $value";
                    },
                    array_values($ativoSerialized),
                    array_keys($ativoSerialized))
            ),
            $entity->getId()
        );
    }
}
