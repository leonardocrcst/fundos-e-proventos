<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class AtivoSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'simbolo' => 'AAZQ11',
            ],
            [
                'simbolo' => 'BTCI11'
            ],
            [
                'simbolo' => 'CPTR11'
            ],
            [
                'simbolo' => 'GALG11'
            ],
            [
                'simbolo' => 'HGCR11'
            ],
            [
                'simbolo' => 'KNCR11'
            ],
            [
                'simbolo' => 'MCHF11'
            ],
            [
                'simbolo' => 'MXRF11'
            ],
            [
                'simbolo' => 'RZAG11'
            ],
            [
                'simbolo' => 'RZTR11'
            ],
            [
                'simbolo' => 'VGHF11'
            ],
            [
                'simbolo' => 'VGIA11'
            ],
            [
                'simbolo' => 'VGIR11'
            ]
        ];
        $this->table('ativo')
            ->insert($data)
            ->saveData();
    }
}
