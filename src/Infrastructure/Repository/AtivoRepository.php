<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\Ativo;
use App\Domain\Model\AtivoInterface;
use App\Domain\Model\EntityInterface;
use App\Domain\Repository\AtivoRepositoryInterface;
use App\Infrastructure\Database\DatabaseAdapterException;
use DateTime;
use Exception;
use PDO;

class AtivoRepository extends EntityRepository implements AtivoRepositoryInterface
{
    private const string TABLE_NAME = 'ativos';

    /**
     * @throws DatabaseAdapterException
     * @throws Exception
     */
    public function openBySimbolo(string $simbolo): AtivoInterface
    {
        $query = sprintf(
            "%s * FROM %s WHERE simbolo = '%s'",
            'SELECT',
            self::TABLE_NAME,
            addslashes($simbolo)
        );
        $request = $this->connection->getConnection()->query($query);
        $data = $request->fetch(PDO::FETCH_ASSOC);
        if (!empty($data)) {
            return Ativo::factory($data);
        }
    }

    /**
     * @throws DatabaseAdapterException
     * @throws Exception
     */
    public function list(): array
    {
        $query = sprintf(
            "%s * FROM %s WHERE deleted_at is NULL",
            'SELECT',
            self::TABLE_NAME
        );
        $request = $this->connection->getConnection()->query($query);
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($data)) {
            return array_map(fn($item) => Ativo::factory($item), $data);
        }
    }

    public function save(AtivoInterface $ativo): int
    {
        if ($ativo->getId()) {
            $ativo->setUpdatedAt(new DateTime());
        }
    }

    public function remove(EntityInterface $entity): void
    {
        // TODO: Implement remove() method.
    }

    public function openBy(string $field, mixed $value): EntityInterface
    {
        // TODO: Implement openBy() method.
    }

    public function openById(int $id): EntityInterface
    {
        // TODO: Implement openById() method.
    }
}
