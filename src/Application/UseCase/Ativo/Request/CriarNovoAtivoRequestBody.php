<?php

namespace App\Application\UseCase\Ativo\Request;

use App\Domain\Model\AtivoInterface;
use App\Domain\Utility\DateTool;
use DateTime;
use Exception;

readonly class CriarNovoAtivoRequestBody
{
    public AtivoInterface $ativo;
    public DateTime $dataEvento;
    public int $quantidade;
    public float $valorUnitario;

    /**
     * @throws Exception
     */
    public function __construct(
        string $simbolo,
        string $dataEvento,
        int $quantidade,
        float $valorUnitario,
    ) {
        $this->dataEvento = DateTool::isDateTime($dataEvento)
            ? DateTime::createFromFormat(DateTool::DATETIME_FORMAT, $dataEvento)
            : new DateTime();
        $this->quantidade = $quantidade;
        $this->valorUnitario = $valorUnitario;
    }
}
