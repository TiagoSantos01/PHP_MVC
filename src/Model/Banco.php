<?php

namespace src\Model;

use src\Controller\ConnnectionController;

class Banco
{
    const BANCOS = 'Bancos';

    const ALL = '*';
    const BANCOID = 'BancoId';
    const BANCO = 'BANCO';

    public function get(int $BancoId): array
    {
        $conn = new ConnnectionController();
        $conn->table(self::BANCOS);
        $conn->column(self::ALL);
        $conn->where(array(self::BANCOID =>$BancoId));

        return $conn->select();
    }

    public function getAll(): array
    {
        $conn = new ConnnectionController();
        $conn->table(self::BANCOS);
        $conn->column(self::ALL);

        return $conn->select();
    }

}