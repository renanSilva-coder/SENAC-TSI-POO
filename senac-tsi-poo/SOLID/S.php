<?php

//SOLID
//Single Responsability

//EXEMPLO 1

class Usuario {

    private $nome;

    public function setNome(){
        //implementação
    }

    public function getNome(){
        //implementação
    }

    public function enviarEmail(){// aqui estou ferindo o principio de responsabilidade única.
        //implementação
    }

    public function exportarParaPlanilha(){// Estou ferindo também
        //implementação
    }
}

//Como refatorar sem ferir o princípio de responsabilidade única


class Usuario {

    private $nome;
    
    public function setNome(){
        //implementação
    }

    public function getNome(){
        //implementação
    }

}

class Email {
    
    
    public function enviarEmail(){
        //implementação
    }

}

class ExportarDados(){


}


class ExportarDadosPlanilha extends ExportarDados {

    public function exportarParaPlanilha(){
        //implementação
    }

}

//FIM EXEMPLO 1

//EXEMPLO 2

class Relatorio {
    private $dados;

    public function setDados(array $dados){
       //implementação 
    }

    public function exportarParaPdf(){// aqui estou ferindo o principio de responsabilidade única.
        //implementação
    }

    public function exportarParaCsv(){// aqui estou ferindo o principio de responsabilidade única.
        //implementação
    }

}

//Como refatorar sem ferir o princípio de responsabilidade única


class Relatorio {
    private $dados;

    public function setDados(array $dados){
        //implementação
    }
}

class ExportaDados{

}

class exportarDadosPdf extends ExportaDados {
    public function exportar(){
        //implementação
    }
}

class exportarDadosCsv extends ExportaDados {
    public function exportar(){
        //implementação
    }
}

//FIM EXEMPLO 2

//EXEMPLO 3

class Post {

    private $titulo;

    public function setTitulo(string $titulo){
        //implementação
    }

    public function gerarUrlAmigavel(){ // aqui estou ferindo o principio de responsabilidade única.
        //implementação
    }

    public function buscarPostSemelhante(){// aqui estou ferindo o principio de responsabilidade única.
        //implementação
    }

}

//ESSAS FUNÇÕES SÃO PARA OUTROS ASSUNTOS, CLASSE DE BUSCA (aí tu pode colocar por tipo de busca) , CLASSE DE URL

//Como refatorar sem ferir o princípio de responsabilidade única


class Post {
    private $titulo;

    public function setTitulo(string $titulo){
        //implementação
    }
}

class Url{

    public function gerarUrlAmigavel(){
        //implementação
    }

}

class Busca {

}

class BuscaPorSemelhança extends Busca {
    public function buscar(){
        //implementação
    }
}
 
//FIM EXEMPLO 3




