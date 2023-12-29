<?php

declare(strict_types=1);

use App\Infrastructure\Database\ColumnDefinitions\ColumnType;
use Phinx\Migration\AbstractMigration;

final class Ativo extends AbstractMigration
{
    public function change(): void
    {
        $this->table('ativos')
            ->addTimestamps()
            ->addColumn('deleted_at', ColumnType::TIMESTAMP->value)
            ->addColumn('simbolo', ColumnType::STRING->value, ['null' => false])
            ->addIndex(['simbolo', 'deleted_at'], ['unique' => true, 'order' => ['simbolo' => 'ASC', 'deleted_at' => 'DESC']])
            ->create();
    }
}
