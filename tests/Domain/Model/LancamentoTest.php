<?php

namespace Tests\Domain\Model;

use App\Domain\Model\Ativo;
use App\Domain\Model\Lancamento;
use PHPUnit\Framework\TestCase;

class LancamentoTest extends TestCase
{
    public function testItCreateLancamento()
    {
        $ativo = $this->getMockBuilder(Ativo::class)
            ->getMock();
        $lancamento = Lancamento::builder()
            ->setAtivo($ativo)
            ->setDataEvento(new \DateTime())
            ->setQuantidade(3)
            ->setValorUnitario(9.03);
        $this->assertInstanceOf(\DateTime::class, $lancamento->getDataEvento());
        $this->assertEquals(9.03, $lancamento->getValorUnitario());
        $this->assertEquals(3, $lancamento->getQuantidade());
    }

    public function testItJsonSerializeLancamento()
    {
        $ativo = $this->getMockBuilder(Ativo::class)
            ->getMock();
        $ativo->method('getId')->willReturn(1);
        $lancamento = Lancamento::builder()
            ->setAtivo($ativo)
            ->setDataEvento(new \DateTime())
            ->setQuantidade(3)
            ->setValorUnitario(9.03);
        $serialized = $lancamento->jsonSerialize();
        $this->assertArrayHasKey('ativo_id', $serialized);
    }
}
