<?php

abstract class DataBase extends PDO{

    private $user = 'root';
    private $pass = '';
    private $db_name = 'controleestoque';
    private $host = 'localhost';
    private $port = '3306';
    private $driver = 'mysql';

    public function __construct(){

        $dsn = $this->driver.':host='.$this->host
                            .';port='.$this->port
                            .';dbname='.$this->db_name;

        parent::__construct($dsn, $this->user, $this->pass);

    }   
}