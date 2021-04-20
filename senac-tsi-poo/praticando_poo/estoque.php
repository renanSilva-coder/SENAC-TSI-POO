<?php

require('classes/Usuario.class.php');
require('classes/Fabricante.class.php');
require('classes/Estoque.class.php');
require('classes/Movimentacao.class.php');
require('classes/Item.class.php');

class Main {

    public function __construct(){
        //teste por enquanto 

       echo "\n\n --- COMEÇO DO PROGRAMA --- \n\n"; 

        $objUsuario = new Usuario;
        $objFabricante = new Fabricante;
        $objEstoque = new Estoque;
        $objMovimentacao = new Movimentacao;
        $objItem = new Item;

        //echo "\n\n --- TODAS AS CLASSES INSTANCIADAS --- \n\n"; 
       
        switch ($_SERVER['argv'][1]) {// pega o segundo argunmento passado pelo usuario via linha de comando (o primeiro argumento é o próprio arquivo)
            case 'gravaUsuario':

                $this->gravaUsuario($objUsuario);

                break;

            case 'editaUsuario':

                $this->editaUsuario($objUsuario);

                break;
            
            default:
                echo "Não existe a funcionalidade {$_SERVER['argv'][1]}";
        }

    }

    public function gravaUsuario($objUsuario){
        $dados = $this->tratarDados();

        $objUsuario->setDados($dados);

        if($objUsuario->gravarDados()){
            echo "usuario gravado com sucesso";
        }
    }

    public function editaUsuario($objUsuario){

        $dados = $this->tratarDados();

        $objUsuario->setDados($dados);

        if($objUsuario->gravarDados()){
            echo "usuario editado com sucesso";
        }
    }

    public function tratarDados(){
        $args = explode(',',$_SERVER['argv'][2]); //dados passados pelo usuário na linha de comando, explode para separar os dados em um array, com um delimitador escolhido por nós, neste caso ','

        foreach($args as $valor){
            
            $arg = explode('=', $valor);
            $dados[$arg[0]] = $arg[1];
        }
        return $dados;
    }

    public function __destruct(){

        sleep(1);

        echo "\n\n --- FIM DO PROGRAMA --- \n\n"; 
    }

}

new Main; 



/**
 * Tabelas do banco:
 * 
 * Itens
 * +---------------+---------------------+------+-----+---------+----------------+
 *| id            | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
 *| nome          | char(255)           | NO   |     | NULL    |                |
 *| descricao     | char(255)           | YES  |     | NULL    |                |
 *| preco         | double(12,2)        | YES  |     | NULL    |                |
 *| id_fabricante | bigint(20) unsigned | YES  |     | NULL    |                |
 * +---------------+---------------------+------+-----+---------+----------------+
 * 
 * Estoques
 * +-------+---------------------+------+-----+---------+----------------+
 *| id    | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
 *| nome  | char(255)           | YES  |     | NULL    |                |
 * +-------+---------------------+------+-----+---------+----------------+
 * 
 * Movimentações
 * +------------------+-------------------------+------+-----+---------+-------+
 *| id_item          | bigint(20) unsigned     | NO   |     | NULL    |       |
 *| id_estoque       | bigint(20) unsigned     | NO   |     | NULL    |       |
 *| qtd_movimentacao | bigint(20)              | YES  |     | NULL    |       |
 *| tipo             | enum('entrada','saida') | NO   | PRI | NULL    |       |
 *| datahora         | datetime                | NO   | PRI | NULL    |       |
 *| id_usuario       | bigint(20) unsigned     | NO   | PRI | NULL    |       |
 * +------------------+-------------------------+------+-----+---------+-------+
 *
 * Itens No Estoque
 * +------------+---------------------+------+-----+---------+-------+
 *| id_item    | bigint(20) unsigned | NO   | PRI | NULL    |       |
 *| id_estoque | bigint(20) unsigned | NO   | PRI | NULL    |       |
 *| qtd        | bigint(20)          | YES  |     | NULL    |       |
 * +------------+---------------------+------+-----+---------+-------+
 * 
 * Usuários
 * +------------+---------------------+------+-----+---------+----------------+
 *| id_usuario | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
 *| cpf        | bigint(20)          | YES  |     | NULL    |                |
 *| nome       | char(255)           | YES  |     | NULL    |                |
 * +------------+---------------------+------+-----+---------+----------------+
 * 
 * Fabricantes
 *+------------+---------------------+------+-----+---------+----------------+
 *| id_usuario | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
 *| cnpj       | bigint(20)          | YES  |     | NULL    |                |
 *| nome       | char(255)           | YES  |     | NULL    |                |
 *+------------+---------------------+------+-----+---------+----------------+
 * */