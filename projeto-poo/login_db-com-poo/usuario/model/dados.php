<?php

chdir( __DIR__ ); //Garante que o codigo seja executado no diretorio model

require_once '../../db.php';

function listarTudo( int $id=null ): array//colocar int $id=null diz que esse parametro é opcional
{

global $db;//posso acessar $db aqui dentro

if( is_null($id) ){

	$str = '';

	//SQL se $id não for passado como parametro:
	//SELECT id, nome, email FROM usuario"

}else{

//caso o usu passe um param para listarTudo()
//Na consulta SQL será adiocionada a cláusula WHERE
//Ainda, p preg_replace() garante que não haverá SQL injection
$str = 'WHERE id = ' .preg_replace('/\D/','',$id);

	//SQL se $id não for passado como parametro:
	//SELECT id, nome, email FROM usuario WHERE id = N"
}

$r = $db->query("SELECT id, nome, email	FROM usuario $str ORDER BY id");
$reg = $r->fetchAll();

return is_array($reg) ? $reg : [];//verifica se $reg está como array. se não ele transforma em um
}

function ja_existe_email(string $email): bool//cria function com paramentro de uma string $email que retorna valor booleano
{
	
	if(empty($email)) return false; //se me passarem uma string vazia ja retorna false

	global $db; //para conseguir acessar fora desse código e neste cod

	//1) preparo a consulta e faço ela de forma segura
	$stmt = $db->prepare('SELECT id FROM usuario WHERE email = :email');

	//2)Acima Coloca :email como valor para tratar e depois aqui no 2) ele trata e coloca em $email dnv;
	$stmt->bindParam(':email', $email);

	//3) Executo a consulta
	$stmt->execute();

	$registro = $stmt->fetch();//retorna o registro; //com os parenteses () ele retorna o padrão que é parametro BOTH, ou seja, os índices numérioco e alfanumérioco

	return is_numeric($registro['id']) ? true : false; //verifica se id é numérico, ou seja, se tem id, se tiver é true senão é false. verificando em algo que eu sei que é numerico para ver se existe apenas.
	// ? é igual ao {} do if comum e : é o else{}

}

function gravar_usuario(string $nome, string $email, string $senha): ?int//?int pode voltar um inteiro um false ou null, ou seja, ñ vai ser necessariamente um inteiro,peço integer mas pode vir null ou false.
{

	global $db;

	$senha = password_hash($senha, PASSWORD_DEFAULT);

	$stmt =	$db->prepare('	INSERT INTO usuario 
								(nome,email,senha) 
							VALUES 
								(:nm,:email,:senha)');

	$stmt->bindParam(':nm', 	$nome);
	$stmt->bindParam(':email', 	$email);
	$stmt->bindParam(':senha', 	$senha);

	$stmt->execute();

	return (int) $db->lastInsertId();//retorna a saída desse método que deve ser o id que foi gerado nesse insert ou no ultimo insert do DB

}


function apagar_usuario( int $id ): bool
{
	if(is_numeric($id)){
		
		global $db;

		if ($db->exec("DELETE FROM usuario where id=$id") > 0){
			return true;
		}else {
			return false;
		}


	}else{

		return false;
	}

}


function editar_usuario(int $id, string $nome, string $email, string $senha): bool//?int pode voltar um inteiro um false ou null, ou seja, ñ vai ser necessariamente um inteiro,peço integer mas pode vir null ou false.
{

	global $db;

	$senha = password_hash($senha, PASSWORD_DEFAULT);

	$stmt =	$db->prepare('	UPDATE usuario SET
	nome = :nm, email = :email, senha = :senha 
							WHERE id = :id');

	$stmt->bindParam(':id',		$id);
	$stmt->bindParam(':nm',		$nome);
	$stmt->bindParam(':email',	$email);
	$stmt->bindParam(':senha',	$senha);

	return $stmt->execute();;

}


// function vincula_imagem_ao_usuario( 
// 	int $id, string $nome_imagem ): bool
// {
// 	global $db;

// 	$stmt = $db->prepare('UPDATE usuario SET foto = :foto WHERE id = :id');

// 	$stmt->bindParam(':foto', $nome_imagem);					
// 	$stmt->bindParam(':id', $id);

// 	return $stmt->execute();	
// }

// function get_imagem_usuario( int $id ): array
// {
// 	global $db;

// 	$stmt = $db->prepare('SELECT foto FROM usuario WHERE id = :id');

// 	$stmt->bindParam(':id', $id);

// 	$stmt->execute();	

// 	return $stmt->fetchAll();
// }
























