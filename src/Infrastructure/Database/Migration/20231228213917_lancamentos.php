<?php

declare(strict_types=1);

use App\Infrastructure\Database\ColumnDefinitions\ColumnType;
use App\Infrastructure\Database\ColumnDefinitions\DecimalColumnOptions;
use App\Infrastructure\Database\ColumnDefinitions\IntegerColumnOptions;
use App\Infrastructure\Database\ColumnDefinitions\TimestampColumnOptions;
use Phinx\Migration\AbstractMigration;

final class Lancamentos extends AbstractMigration
{
    public function change(): void
    {
        $this->table('lancamentos')
            ->addTimestamps()
            ->addColumn('deleted_at', ColumnType::TIMESTAMP->value)
            ->addColumn(
                'carteira_id',
                ColumnType::BIG_INTEGER->value,
                (new IntegerColumnOptions())
                    ->unsigned()
                    ->nullable(true)
                    ->jsonSerialize()
            )
            ->addColumn(
                'ativo_id',
                ColumnType::BIG_INTEGER->value,
                (new IntegerColumnOptions())
                    ->unsigned()
                    ->nullable(false)
                    ->jsonSerialize()
            )
            ->addColumn(
                'data_evento',
                ColumnType::TIMESTAMP->value,
                (new TimestampColumnOptions())
                    ->nullable(false)
                    ->jsonSerialize()
            )
            ->addColumn(
                'valor_unitario',
                ColumnType::FLOAT->value,
                (new DecimalColumnOptions())
                    ->unsigned()
                    ->nullable(false)
                    ->jsonSerialize()
            )
            ->addColumn(
                'quantidade',
                ColumnType::INTEGER->value,
                (new IntegerColumnOptions())
                    ->nullable(false)
                    ->jsonSerialize()
            )
            ->addForeignKey(['ativo_id'], 'ativos', 'id')
            ->create();
    }
}
