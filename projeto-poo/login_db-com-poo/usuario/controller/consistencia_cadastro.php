<?php


chdir( __DIR__ );

$nome= $_POST['nome'] ?? null;
$email= $_POST['email'] ?? null;
$senha= $_POST['senha'] ?? null;//se vier o dado ou nulo (vazio)
$conf_senha= $_POST['conf_senha'] ?? null;

$senha = trim($senha);//trim() tira os espaços que estão antes e depois da senha;
$email = strtolower($email);//tratamento: deixa minusculo o que está em email;

$erros = [];

//Verifica se nome tem 2 ou mais caracteres
if( strlen($nome) < 2 ){
	
	echo $erros[] = 'O nome tem menos que 2 caracteres!';

}

//Verifica se o e-mail é válido
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){//se filter retornar false na validação{
	$erros[] = 'E-mail inválido!';
	
//se o email não for inválido verifico se ja existe
//também faz o desvio do momento do cadastro e da edição com && !isset($_POST['gravar'])
}elseif ( ja_existe_email($email) && !isset($_POST['gravar']) ){
	
	$erros[] = 'E-mail já cadastrado!';	

}

//verifica se a senha tem menos de oito caracteres
if( strlen($senha) < 8 ){
	$erros[] = 'A senha tem menos que 8 caracteres!';
	
//verifica se a senha é diferente de conf_senha
}elseif( $senha != $conf_senha){
	$erros[] = 'A confirmação de senha é inválida!';
	
}

 
