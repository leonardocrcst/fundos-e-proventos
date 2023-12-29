<?php

namespace Tests\Infrastructure\Repository;

use App\Domain\Model\AtivoInterface;
use App\Infrastructure\Database\DatabaseAdapterException;
use App\Infrastructure\Database\DatabaseConnection;
use App\Infrastructure\Repository\AtivoRepository;
use PHPUnit\Framework\TestCase;

class AtivoRepositoryTest extends TestCase
{
    /**
     * @throws DatabaseAdapterException
     */
    public function testItOpenBySimbolo(): void
    {
        $connection = new DatabaseConnection();
        $ativoRepository = new AtivoRepository($connection);
        $mchf11 = $ativoRepository->openBySimbolo('MCHF11');
        $this->assertInstanceOf(AtivoInterface::class, $mchf11);
    }
}
