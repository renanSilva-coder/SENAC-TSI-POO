<?php

interface iPessoa{
    public function enviarCorrespondencia();
    public function receberCorrespondencia();
}

abstract class Pessoa {
    protected $nome;
    protected $endereco;

    public function enviarCorrespondencia(){
        sleep(3);//dá uma delay de 3 segundos e vai pra próxima linha de comando
        echo "<br>carta ----------> destino <br>";
    }

    public function receberCorrespondencia(){}

}

class PessoaFisica extends Pessoa{
    private $cpf;
    private $imc;

    public function enviarCorrespondencia(){
        sleep(1);//dá uma delay de 3 segundos e vai pra próxima linha de comando
        echo "<br>Vai Até a agência dos Correios<br>";
        sleep(1);
        echo "<br>Fica 45horas na fila!<br>";
        sleep(1);
        echo "<br>Tem o pacote roubado<br>";

    }
    
    public function praticaExercicio(){}

    public function comer(){}
}

class PessoaJuridica extends Pessoa{
    private $cnpj;
    private $nomeFantasia;

    public function abrirFilial(){}

    public function fecharFilial(){}
}

$joao = new PessoaFisica;
var_dump($joao);
$joao->enviarCorrespondencia();