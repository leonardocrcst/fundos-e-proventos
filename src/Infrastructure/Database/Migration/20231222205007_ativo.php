<?php

declare(strict_types=1);

use App\Infrastructure\Database\Type\ColumnType;
use Phinx\Migration\AbstractMigration;

final class Ativo extends AbstractMigration
{
    public function change(): void
    {
        $this->table('ativo')
            ->addTimestamps()
            ->addColumn('deleted_at', ColumnType::TIMESTAMP->value)
            ->addColumn('simbolo', ColumnType::STRING->value, ['null' => false])
            ->addIndex(['simbolo'], ['unique' => true, 'order' => ['simbolo' => 'ASC']])
            ->create();
    }
}
