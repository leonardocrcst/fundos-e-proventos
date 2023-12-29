<?php

namespace Tests\Infrastructure\Repository;

use App\Domain\Model\Ativo;
use App\Domain\Model\AtivoInterface;
use App\Domain\Repository\AtivoRepositoryInterface;
use App\Infrastructure\Database\DatabaseAdapterException;
use App\Infrastructure\Database\DatabaseConnection;
use App\Infrastructure\Database\DatabaseConnectionInterface;
use App\Infrastructure\Repository\AtivoRepository;
use PHPUnit\Framework\TestCase;

class AtivoRepositoryTest extends TestCase
{
    protected DatabaseConnectionInterface $connection;
    protected AtivoRepositoryInterface $ativoRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->connection = new DatabaseConnection();
        $this->ativoRepository = new AtivoRepository($this->connection);
    }

    /**
     * @throws DatabaseAdapterException
     */
    public function testItOpenBySimbolo(): void
    {
        $mchf11 = $this->ativoRepository->openBySimbolo('MCHF11');
        $this->assertInstanceOf(AtivoInterface::class, $mchf11);
    }

    /**
     * @throws DatabaseAdapterException
     */
    public function testItListAtivos(): void
    {
        $ativos = $this->ativoRepository->list();
        $this->assertIsArray($ativos);
    }

    /**
     * @throws DatabaseAdapterException
     */
    public function testItSaveAndRemoveAtivo(): void
    {
        $ativo = Ativo::builder()
            ->setSimbolo('KNIP11');
        $this->ativoRepository->save($ativo);
        $this->assertIsInt($ativo->getId());
        $this->assertNull($ativo->getDeletedAt());
        $this->ativoRepository->remove($ativo);
        $this->assertNotNull($ativo->getDeletedAt());
    }
}
