<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class LancamentoSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'ativo_id' => 2,
                'data_evento' => '2023-03-28',
                'valor_unitario' => 9.13,
                'quantidade' => 1
            ],
            [
                'ativo_id' => 11,
                'data_evento' => '2023-03-28',
                'valor_unitario' => 9.07,
                'quantidade' => 1
            ],
        ];
        $this->table('lancamentos')
            ->insert($data)
            ->saveData();
    }
}
