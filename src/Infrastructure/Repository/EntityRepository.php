<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\EntityInterface;
use App\Domain\Repository\EntityRepositoryInterface;
use App\Infrastructure\Database\DatabaseAdapterException;
use App\Infrastructure\Database\DatabaseConnectionInterface;
use App\Infrastructure\Database\QueryBuilder\InsertTrait;
use App\Infrastructure\Database\QueryBuilder\SelectTrait;
use App\Infrastructure\Database\QueryBuilder\UpdateTrait;
use DateTime;
use Exception;
use PDO;

abstract class EntityRepository implements EntityRepositoryInterface
{
    use InsertTrait;
    use UpdateTrait;
    use SelectTrait;

    public function __construct(
        protected DatabaseConnectionInterface $connection
    ) {
    }

    /**
     * @throws DatabaseAdapterException
     */
    public function save(EntityInterface &$entity): void
    {
        $connection = $this->connection->getConnection();
        if (!empty($entity->getId())) {
            $entity->setUpdatedAt(new DateTime());
            $query = $this->getUpdateQuery($entity);
            $connection->query($query);
        }
        if (empty($entity->getId())) {
            $query = $this->getInsertQuery($entity);
            $connection->query($query);
            $entity->setId($connection->lastInsertId());
        }
    }

    /**
     * @throws DatabaseAdapterException
     */
    public function remove(EntityInterface &$entity): void
    {
        $connection = $this->connection->getConnection();
        if (!empty($entity->getId())) {
            $entity->setDeletedAt(new DateTime());
            $query = $this->getUpdateQuery($entity);
            $connection->query($query);
        }
    }

    /**
     * @throws DatabaseAdapterException
     */
    public function list(?array $columns = null): array
    {
        $query = $this->getSelectQuery($columns);
        $request = $this->connection->getConnection()->query(
            $query
        );
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @throws DatabaseAdapterException
     * @throws Exception
     */
    public function openBy(string $field, mixed $value): ?array
    {
        $query = $this->getSelectQueryByFieldValue($field, $value);
        $request = $this->connection->getConnection()->query(
            $query
        );
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    abstract protected function getTable(): string;
}
