<?php

class Campeonato{
 
    protected $dataInicio;
    protected $continente;
    protected $qtdTimes;
    protected $times = [];
    protected $trofeu;

    public function getDataInicio(){
        return $this->data;
    }

    public function setDataInicio($data){
        $this->data = $data;
        return true;
    }
    
} 

class Mundial extends Campeonato{
    private $confederacao = 'CONMEBOL';

    public function setConfederacao(string $confederacao): bool{
        $this->confederacao = $confederacao;
        return true;
    }

    public function getConfederacao(){
        return $this->confederacao;
    }

}

$mundial = new Mundial;
$mundial->setDataInicio('14/04/2022');

echo "\n\nA data de início do Mundial é: ".$mundial->getDataInicio()."\n\n";
echo "A Confedereção da  é: ".$mundial->getConfederacao()."\n\n";
// class QuartasMundial extends Mundial{
//     private $disputas = [];
// }


