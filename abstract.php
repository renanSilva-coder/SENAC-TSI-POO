<?php 

interface iCasaInteligente{
    public function limpaSe(): void;
}

abstract class CasaInteligente {
    protected $altura;
    protected $largura;
    protected $area;

    public function alugaSe(){

    }

    public function vendeSe(){

    }

    public function limpaSe(): void{
        echo "<br>Casa toda limpada!";
    }
}

class BanheiroInteligente extends CasaInteligente{
    private $chuveiroEstado = false;
    private $espelhoLimpo = true;

    public function ligaChuveiro(): bool{
        return $this->chuveiroEstado = true;
    }

    public function desligaChuveiro(): bool{
        return $this->chuveiroEstado = false;
    }

    public function getChuveiro(){
        return $this->chuveiroEstado;
    }
}

class SalaInteligente extends CasaInteligente{
    private $TVEstado = false;
    private $qtdSofa;

    public function ligaTV(): bool{
        return $this->TVEstado = true;
    }

    public function desligaTV(): bool{
        return $this->TVEstado = false;
    }
}

$controleBanheiro = new BanheiroInteligente;
$controleBanheiro->ligaChuveiro();
if($controleBanheiro->getChuveiro() == true){
    echo "O chuveiro está ligado";
}else{
    echo "O chuveiro está desligado";
}
$controleBanheiro->limpaSe();

