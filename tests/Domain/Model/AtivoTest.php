<?php

namespace Tests\Domain\Model;

use App\Domain\Model\Ativo;
use DateTime;
use PHPUnit\Framework\TestCase;

class AtivoTest extends TestCase
{
    public function testItCreateAtivo()
    {
        $ativo = Ativo::builder()
            ->setSimbolo('NSDV11');

        $this->assertInstanceOf(DateTime::class, $ativo->getCreatedAt());
        $this->assertEquals('NSDV11', $ativo->getSimbolo());
    }

    public function testItJsonSerializerAtivo()
    {
        $ativo = Ativo::builder()
            ->setSimbolo('NSDV11')
            ->setId(1)
            ->setUpdatedAt(new DateTime());
        $serialized = $ativo->jsonSerialize();
        $this->assertArrayHasKey('simbolo', $serialized);
        $this->assertArrayHasKey('id', $serialized);
        $this->assertArrayHasKey('created_at', $serialized);
        $this->assertArrayHasKey('updated_at', $serialized);
    }
}
