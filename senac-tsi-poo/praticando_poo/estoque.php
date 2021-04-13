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

       echo "\n\n --- TODAS AS CLASSES INSTANCIADAS --- \n\n"; 
       
    }

    public function __destruct(){
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