<?php

require(__DIR__ . '/../interfaces/usuario.interface.php');
require_once(__DIR__ . '/abstratas/TipoPessoa.class.php');

class Usuario extends TipoPessoa implements iUsuario{
   
    protected $id;
    protected $cpf;
    protected $nome;

    public function __construct(){
        parent::__construct();//executa o método construtor da classe que estou herdando, neste caso o construtor da classe TipoPessoa
    }

    public function setDados(array $dados): bool{
        $this->id = $dados['id'] ?? null;
        $this->cpf = $dados['cpf'] ?? null;//se for passado o vetor com indice cpf ele coloca lá na variável, se não coloca nulo;
        $this->nome = $dados['nome'] ?? null;

        return true;
    }

    

    public function gravarDados(): bool{
      
        if (empty($this->id)){//verifica se o id é vazio
            return $this->insert();
        }else{
            return $this->update();
        }
    
    }

    public function delete(): bool{
        if($this->id){
            
            $stmt = $this->prepare("DELETE FROM usuarios WHERE id_usuario = :id");
            
            if( $stmt->execute( [':id'=>$this->id] ) ){
             
                return true;
            
            }else{
               
                return false;
            }
        
        }else{
         
            return false;
       
        }
    }

    public function update(){
        $stmt = $this->prepare("UPDATE 
                                    usuarios
                                SET
                                    cpf = :cpf, nome = :nome
                                WHERE
                                    id_usuario = :id");
        
        if($stmt->execute([ ':cpf' => $this->cpf, 
                            ':nome' => $this->nome,
                            ':id' => $this->id]
        )){
            return true;
        }
        return false;
    }

    public function insert(){
        $stmt = $this->prepare("INSERT INTO usuarios
                                    (cpf, nome)
                                VALUES
                                    (:cpf,:nome)");

        if($stmt->execute([':cpf'=>$this->cpf, ':nome'=>$this->nome])){
            return true;
        }
        return false;
    }

    public function getDados(int $id_usuario): array{

    }

    public function getAll(): array{
        $stmt = $this->prepare("SELECT * FROM usuarios");
        
        $stmt->execute();
         
        return $stmt->fetchAll(); 
        
    }
}