<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
// $sessaoUsuario = $_SESSION['sessaoDoUser'] = 'Usuário';
require_once 'db.php';
//Exemplo de como fazer o salt na senha, uma criptografia
// $pass = password_hash('123', PASSWORD_DEFAULT);
// $pass = password_hash('123456', PASSWORD_DEFAULT);
require_once 'usuario/model/dados.php';

if (isset($_SESSION['login'])) { //Caso o usuario ja esteja logado no sistema

	// $foto_vetor = get_imagem_usuario($_SESSION['id']);

	// $foto = $foto_vetor[0]['foto'];

		include 'header_tpl.php';
		include 'index_menu_tpl.php';
		include 'footer_tpl.php';

} elseif ( isset($_POST['entrar']) ) { // Caso o usuario preencheu o form de login

	$login = filter_var($_POST['login'],FILTER_SANITIZE_EMAIL);//filter_var filtra a variavel enquanto o parametro sanitize desconsidera se o login for algo diferente de um email, isso evita SQLInjection, pd fazer assim ou com prepare na consulta;
	$senha = $_POST['senha'];

	//Verificar se existe o usuario e pegar o hash de senha
	$r = $db->query("SELECT senha, id FROM usuario WHERE email = '$login'");
	$reg = $r->fetch(PDO::FETCH_ASSOC);
	$hash = $reg['senha'];

	// $r = $db->query("SELECT senha from usuario WHERE email = '$login'");//se o login bater com o que foi digitado pelo usuario ele pega a senha para fazer a comparação, guarda essa consulta em $r
	// $reg = $r->fetch(PDO::FETCH_ASSOC);//com isso eu pego a saída da consulta, e jogo em $reg
	// $hash = $reg['senha'];//só para facilitar eu pego o hash que está no banco, ou seja, a senha que está no banco e coloco em $hash, só p ficar mais facil de trabalhar


	// comparar a senha passada pelo usuario com hash armazenado no db

	if ( password_verify($senha, $hash) ){//password_verify() compara um hash com um dado para verificar se está correto ou bate, como na verificação de senha

		$_SESSION['login'] = $login;
		$_SESSION['id'] = $reg['id'];

		include 'header_tpl.php';
		include 'index_menu_tpl.php';
		include 'footer_tpl.php';

	}else{
	$msg = 'Credenciais inválidas, tente novamente!';
	include 'index_tpl.php';
	}	

}else{// Caso o usuario tenha acabado de chegar no sistema
	include 'index_tpl.php';
}


//SEMPRE QUE FOR FAZER UM PROGRAMA LEMBRAR DE EVITAR SQL INJECTION E DAR HASH NA SENHA SE POSSIVEL





