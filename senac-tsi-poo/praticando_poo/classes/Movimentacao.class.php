<?php

require(__DIR__ . '/../interfaces/movimentacao.interface.php');

class Movimentacao implements iMovimentacao{
   
    public function setDados(array $dados): bool{

    }


    public function getDados(string $tipo, string $datahota, int $id_usuario): array{

    }
}