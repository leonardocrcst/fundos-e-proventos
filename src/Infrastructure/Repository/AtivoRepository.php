<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\Ativo;
use App\Domain\Model\AtivoInterface;
use App\Domain\Repository\AtivoRepositoryInterface;
use App\Infrastructure\Database\DatabaseAdapterException;
use App\Infrastructure\Repository\Exception\RegisterNotFoundException;
use Exception;

class AtivoRepository extends EntityRepository implements AtivoRepositoryInterface
{
    public static string $tableName = 'ativos';

    /**
     * @throws DatabaseAdapterException
     * @throws Exception
     */
    public function openBySimbolo(string $simbolo): AtivoInterface
    {
        $data = parent::openBy('simbolo', $simbolo);
        if (empty($data)) {
            throw new RegisterNotFoundException("\"$simbolo\" at " . self::$tableName);
        }
        return Ativo::factory($data);
    }

    /**
     * @return AtivoInterface[]
     * @throws DatabaseAdapterException
     * @throws Exception
     */
    public function list(?array $columns = null): array
    {
        $data = parent::list($columns);
        if (empty($data)) {
            throw new RegisterNotFoundException(self::$tableName . " is empty");
        }
        return array_map(fn($item) => Ativo::factory($item), $data);
    }

    /**
     * @throws DatabaseAdapterException
     * @throws Exception
     */
    public function openById(int $id): AtivoInterface
    {
        $data = parent::openBy('id', $id);
        if (empty($data)) {
            throw new RegisterNotFoundException("Row \"$id\" at " . self::$tableName);
        }
        return Ativo::factory($data);
    }

    protected function getTable(): string
    {
        return self::$tableName;
    }
}
