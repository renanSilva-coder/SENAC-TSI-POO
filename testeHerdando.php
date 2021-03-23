<?php

interface iCoposDeCozinha {

    public function setMaterial(string $material):bool;
    public function getMaterial(): string;
    public function setCategDesenho(string $categDesenho):bool;

}

class CoposDeCozinha implements iCoposDeCozinha{
    protected $material;
    protected $qtdTotal;
    protected $tamanhoMedio;
    protected $categDesenho;

    public function setMaterial( string $material ) : bool{
        $this->material = $material;
        return true;
    }

    public function getMaterial() : string{
        return $this->material;
    }

    public function setCategDesenho( string $categDesenho) : bool{
        $this->categDesenho = $categDesenho;
        return true;
    }

    public function getCategDesenho() : string {
        return $this->categDesenho;
    }

}

class Xicara extends CoposDeCozinha{
    private $tipoDeAlca;

    public function setTipoDeAlca(string $tipoDeAlca) : bool{
        $this->tipoDeAlca = $tipoDeAlca;
        return true;
    }

}

class XicaraCorinthiana extends Xicara{
    private $frase = 'Vai corinthians';
    
    public function setFrase(): bool{
        $this->frase = 'Gaviões da Fiel';
        return true;
    }

    public function getFrase(){
        return $this->frase;
    }

}

class XicaraParaEntrega {

    private $objXicaraParaEntrega;

    public function __construct($objXicaraParaEntrega){

        echo "Construtor executado!<br>";
        $this->objXicaraParaEntrega = $objXicaraParaEntrega;

    }

    public function vender(){

    }

    public function __destruct(){
        echo "<br>Destrutor executado!<br>";
    }

}

class VendedorDeXicara{

    private $nome;
    
    public function anotaValores(){

    }

    public function tirarDuvidas(){

    }

    public function vendaDeXicaras($objXicaraParaEntrega){
        $objXicaraParaEntrega->vender();
    }

}


$xiCorinthians =  new XicaraCorinthiana;
$xiCorinthians->setFrase();
$xicaraParaEntrega =  new XicaraParaEntrega($xiCorinthians);
$james = new VendedorDeXicara;
echo "<br>A frase é: ". $xiCorinthians->getFrase() . "<br>";



